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
        // remove day from date so dates are grouped by month
        $initialData = Summary::where([
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

        // dd($dates);

        $totals = $initialData->groupBy(function($value) {
            return \Carbon\Carbon::parse($value->date)->format('M Y');

        })->map(function($values, $date) {
            return $values->sum('count');
        });

        

        // dd($dates);
        // dd($summaries);

        // get dates and totals
        // $dates = $summaries->groupBy((function($summary) {;
        //     return \Carbon\Carbon::parse($summary['date'])->format('M Y');
        // }));

        // dd('test');
        // ->map(function($summary, $date) {
        //     return $summary->sum('count');
        // })->mapWithKeys(function ($item, $date) {
        //     return [date('M Y', strtotime($date)) => $item];
        // });

        // dd('test');

        // get summary data grouped by status for looping through table rows
        // $summaries = $summaries->groupBy('status_id')->sort()->map(function($item) {
        //     return $item->sortByDesc('date');
        // });

        // $summaries2 = $summaries->groupBy('status_id')->sort()->map(function($item) {
        //     return $item->sortByDesc('date');
        // });

        // dd($summaries);

        // status lookup table to rewference name and colors
        $statusTable = Status::all()->mapWithKeys(function($status, $key) {
            return [$status->id => ['color' => $status->color, 'name' => $status->name]];
        });

        // orders

        // get the last 12 months starting from current month
        $months = [];
        for ($i=0; $i < 12; $i++) { 
            $months[now()->subMonths($i)->format('M Y')] = 0;
        }
        
        // get the orders grouped by month
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
            'business' => $business,
            'dates' => $dates,
            'summaries' => $summaries,
            'status' => $statusTable,
            'totals' => $totals,
            'breadcrumbs_links' => [
                'Businesses' => route('business.index'), 
                $business->name => route('business.show', $business),
                'Business Summary' => route('summary.index', $business),
            ]
        ];

        return view('summary.index', $data);
    }
}
