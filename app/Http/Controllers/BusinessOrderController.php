<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessOrderController extends Controller
{
    public function index(Business $business)
    {
        $data = [
            'business' => $business,
            'orders' => $business->orders()->orderBy('invoice_date', 'desc')->paginate(10),
            'orders_total' => number_format($business->orders()->sum('amount') / 100, 2),
            'orders_average' => number_format(round($business->orders()->avg('amount') / 100, 2), 2),
        ];
        
        return view('business.orders.index', $data);
    }

}
