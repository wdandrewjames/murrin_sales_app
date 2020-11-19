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
            // get initial data
            // remove day from date so dates are grouped by month
            $initialData = Models\Summary::where([
                ['business_id', '=', $business->id],
                ['date', '>', now()->subYear()],
            ])->get();
            $summaries = $initialData->map(function($item, $key) {
            
                $date = new \DateTime($item->date); 
                
                return [
                    'id' => $item->id,
                    'business_id' => $item->business_id,
                    'status_id' => $item->status_id,
                    'count' => $item->count,
                    'date' => $date->format( 'Y-m' ),
                ];
            })
    
            ->groupBy((function($summary) {;
                return $summary['status_id'];
            }));
    
            $dates = [];


        foreach ($summaries as $key => $value) {
            $summaries[$key] = $value->groupBy('date');
            foreach ($summaries[$key] as $date => $summary) {
                $summaries[$key][$date] = $summary->sum('count');
                $date = \Carbon\Carbon::parse($date . '-01')->format('M Y');
                if (!in_array($date, $dates)) {
                    $dates[] = $date;
                }
            }
        }

        $totals = $initialData->groupBy(function($value) {
            return \Carbon\Carbon::parse($value->date)->format('M Y');

        })->map(function($values, $date) {
            return $values->sum('count');
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
                'totals' => $totals
            ];

            $pdf = \PDF::loadView('pdf', $data)->setPaper('A4', 'landscape')->stream();
            Mail::to($business->email)->send(new \App\Mail\SendReport($pdf, $business));
        });

    }
}
