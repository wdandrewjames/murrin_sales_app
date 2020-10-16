<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Summary;
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
        
        // get dates
        $dates = $summaries->groupBy('date')
        ->map(function($summary, $date) {
            return $summary->sum('count');
        })->mapWithKeys(function ($item, $key) {
            return [date('M Y', strtotime($key)) => $item];
        });

        $counts = $summaries->groupBy('status_id');

        //add zero counts for statuses that do not exist
        foreach ($counts as $status => $value) {
            foreach (\App\Models\Status::all()->pluck('id') as $statusId) {
                if (! isset($counts[$statusId])) {
                    $counts[$statusId] = 0;
                }
            }
        }

        $counts = $counts->mapWithKeys(function ($item, $key) {
            return [\App\Models\Status::find($key)->id => $item];
        });

        $data = [
            'business' => $business,
            'counts' => $counts->sortKeys(),
            'dates' => $dates,
            'breadcrumbs_links' => [
                'Businesses' => route('business.index'), 
                $business->name => route('business.show', $business),
                'Business Summary' => route('summary.index', $business),
            ]
        ];

        return view('summary.index', $data);
    }
}
