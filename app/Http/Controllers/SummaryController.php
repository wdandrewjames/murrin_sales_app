<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Summary;
use App\Models\Status;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(Business $business)
    {
        // get initial data
        $summaries = Summary::where([
            ['business_id', '=', $business->id],
            ['date', '>', now()->subYear()],
        ])->get()->sortByDesc('date');
        
        // get dates and totals
        $dates = $summaries->groupBy('date')
        ->map(function($summary, $date) {
            return $summary->sum('count');
        })->mapWithKeys(function ($item, $date) {
            return [date('M Y', strtotime($date)) => $item];
        });

        // get summary data grouped by status for looping through table rows
        $summaries = $summaries->groupBy('status_id')->sort()->map(function($item) {
            return $item->sortByDesc('date');
        });

        // status lookup table to rewference name and colors
        $statusTable = Status::all()->mapWithKeys(function($status, $key) {
            return [$status->id => ['color' => $status->color, 'name' => $status->name]];
        });

        $data = [
            'business' => $business,
            'dates' => $dates,
            'summaries' => $summaries,
            'status' => $statusTable,
            'breadcrumbs_links' => [
                'Businesses' => route('business.index'), 
                $business->name => route('business.show', $business),
                'Business Summary' => route('summary.index', $business),
            ]
        ];

        return view('summary.index', $data);
    }
}
