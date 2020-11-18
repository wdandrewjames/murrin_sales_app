<?php

namespace App\Console\Commands;

use App\Models;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class GenerateReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:generate-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates weekly summary report';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // status lookup table to rewference name and colors
        $statusTable = Models\Status::all()->mapWithKeys(function ($status, $key) {
            return [$status->id => ['color' => $status->color, 'name' => $status->name]];
        });

        Models\Business::all()->each(function($business) use($statusTable) {
            $summaries = Models\Summary::where([
                ['business_id', '=', $business->id],
                ['date', '>', now()->subYear()],
            ])
                ->get()
                ->map(function ($item, $key) {
                    $date = new \DateTime($item->date);
    
                    return [
                        'id' => $item->id,
                        'business_id' => $item->business_id,
                        'status_id' => $item->status_id,
                        'count' => $item->count,
                        'date' => $date->format('Y-m'),
                    ];
                })
                ->sortByDesc('date');
    
            // get dates and totals
            $dates = $summaries->groupBy('date')
                ->map(function ($summary, $date) {
                    return $summary->sum('count');
                })->mapWithKeys(function ($item, $date) {
                    return [date('M Y', strtotime($date)) => $item];
                });
    
            // get summary data grouped by status for looping through table rows
            $summaries = $summaries->groupBy('status_id')->sort()->map(function ($item) {
                return $item->sortByDesc('date');
            });

            // get the last 12 months starting from current month
            $months = [];
            for ($i=0; $i < 12; $i++) { 
                $months[now()->subMonths($i)->format('M Y')] = 0;
            }

            $orders = $business->orders->sortByDesc('invoice_date')->groupBy(function($order) {
                return \Carbon\Carbon::parse($order->invoice_date)->format('M Y');
            });
    
            
            $orders = $orders->map(function($item, $key) {
                return number_format($item->sum('amount') / 100, 2);
            });
    
            foreach ($months as $month => $amount) {
                if (isset($orders[$month])) {
                    $months[$month] = $orders[$month];
                }
            }
    
            $data = [
                'orders' => $months,
                'dates' => $dates,
                'summaries' => $summaries,
                'status' => $statusTable,
            ];

            $pdf = \PDF::loadView('pdf', $data)->setPaper('A4', 'landscape')->stream();
            Mail::to('aj.rushton@icloud.com')->send(new \App\Mail\SendReport($pdf, $business));
        });

    }
}
