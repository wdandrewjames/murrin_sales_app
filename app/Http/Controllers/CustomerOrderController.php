<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function create(Customer $customer)
    {
        $data = [
            'customer' => $customer,
            'breadcrumbs_links' => [
                'Businesses' => route('business.index'), 
                $customer->business->name => route('business.show', $customer->business),
                $customer->name => route('customer.show', $customer),
                'Create Customer Order' => route('customers.order.create', $customer),
            ]
        ];

        return view('customer.orders.create', $data);
    }

    public function store(Customer $customer)
    {
        $validatedData = request()->validate([
            'amount' => 'numeric',
            'invoice_number' => 'nullable',
            'invoice_date' => 'date',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['customer_id'] = $customer->id;

        Order::create($validatedData);
        
        // make sure customer has the status of a current customer if they have made an order.
        if (! $customer->isCurrent()) {
            $customer->makeCurrent();
            $customer->save();
        }
        return redirect()->route('customer.show', $customer);
    }

    public function edit(Customer $customer, Order $order)
    {
        $data = [
            'customer' => $customer,
            'order' => $order,
            'breadcrumbs_links' => [
                'Businesses' => route('business.index'), 
                $customer->business->name => route('business.show', $customer->business),
                $customer->name => route('customer.show', $customer),
                'Edit Customer Order' => route('customers.order.edit', [$customer, $order]),
            ]
        ];

        return view('customer.orders.edit', $data);
    }

    public function update(Customer $customer, Order $order)
    {
        $validatedData = request()->validate([
            'amount' => 'numeric',
            'invoice_number' => 'nullable',
            'invoice_date' => 'date',
        ]);

        $order->update($validatedData);
        
        // make sure customer has the status of a current customer if they have made an order.
        if (! $customer->isCurrent()) {
            $customer->makeCurrent();
        }
        return redirect()->route('customer.show', $customer);
    }
}
