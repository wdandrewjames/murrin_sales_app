<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessOrderController extends Controller
{
    public function index(Business $business)
    {
        if (request()->get('start') && request()->get('end')) {
            $orders = $business->orders()
                ->where([
                    ['invoice_date', '>=', request()->get('start')],
                    ['invoice_date', '<=', request()->get('end')],
                ])
                ->orderBy('invoice_date', 'desc')->paginate(10);
        } else {
            $orders = $business->orders()->orderBy('invoice_date', 'desc')->paginate(10);
        }

        $data = [
            'business' => $business,
            'orders' => $orders,
            'orders_total' => number_format($business->orders()->sum('amount') / 100, 2),
            'orders_average' => number_format(round($business->orders()->avg('amount') / 100, 2), 2),
        ];
        
        return view('business.orders.index', $data);
    }

}
