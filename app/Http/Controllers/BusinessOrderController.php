<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessOrderController extends Controller
{
    public function index(Business $business)
    {
        // booooo, this is not ideal!
        if (request()->get('start') && request()->get('end')) {
            $orders = $business->orders()
                ->where([
                    ['invoice_date', '>=', request()->get('start')],
                    ['invoice_date', '<=', request()->get('end')],
                ])
                ->orderBy('invoice_date', 'desc');
        } elseif (request()->get('start')) {
            $orders = $business->orders()
                ->where('invoice_date', '>=', request()->get('start'))
                ->orderBy('invoice_date', 'desc');
        } elseif (request()->get('end')) {
            $orders = $business->orders()
                ->where('invoice_date', '<=', request()->get('end'))
                ->orderBy('invoice_date', 'desc');           
        } else {
            $orders = $business->orders()->orderBy('invoice_date', 'desc');
        }

        $data = [
            'business' => $business,
            'orders_total' => number_format(($orders->sum('amount') / 100)),
            'orders_average' => number_format(round(($orders->avg('amount') / 100), 2)),
            'orders' => $orders->paginate(10),
        ];

        return view('business.orders.index', $data);
    }
}
