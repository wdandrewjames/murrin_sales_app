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
    
            $data = [
                'business' => $business,
                'dates' => $dates,
                'summaries' => $summaries,
                'status' => $statusTable,
            ];

            $pdf = \PDF::loadView('pdf', $data)->stream();
            Mail::to('aj.rushton@icloud.com')->send(new \App\Mail\SendReport($pdf, $business));
        });

    }
}
