<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Customer;
use App\Models\Status;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show(Customer $customer)
    {
        $data = [
            'customer' => $customer,
            'orders' => $customer->orders()->orderBy('invoice_date', 'desc')->paginate(10),
            'statuses' => Status::all('id', 'name'),
            'breadcrumbs_links' => ['Businesses' => route('business.index'), $customer->business->name => route('business.show', $customer->business), $customer->name => route('customer.show', $customer)],
        ];

        return view('customer.show', $data);
    }

    public function create(Business $business)
    {
        $data = [
            'business' => $business,
            'breadcrumbs_links' => ['Businesses' => route('business.index'), $business->name => route('business.show', $business), 'Add Customer' => route('customer.create', $business)],
        ];
        return view('customer.create', $data);
    }

    public function store(Business $business)
    {
        $validatedData = request()->validate([
            'company_name' => ['required', 'max:60'],
            'name' => ['required', 'max:60'],
            'email' => ['required', 'max:120', 'email'],
            'job_title' => ['required', 'max:120'],
            'website' => ['nullable', 'max:120'],
            'tel' => ['nullable', 'max:50'],
            'tel_alt' => ['nullable'],
            'street_address' => ['nullable'],
            'city' => ['nullable'],
            'county' => ['nullable'],
            'post_code' => ['nullable'],
        ]);

        $validatedData['business_id'] = $business->id;
        
        $customer = Customer::create($validatedData);

        return Redirect()->route('customer.show', $customer->id);
    }

    public function edit(Customer $customer)
    {
        $data = [
            'customer' => $customer,
            'breadcrumbs_links' => ['Businesses' => route('business.index'), $customer->business->name => route('business.show', $customer->business), 'Edit Customer' => route('customer.edit', $customer)],
        ];
        return view('customer.edit', $data);
    }

    public function update(Customer $customer)
    {
        $customer->update(request()->validate([
            'company_name' => ['required', 'max:60'],
            'name' => ['required', 'max:60'],
            'email' => ['required', 'max:120', 'email'],
            'job_title' => ['required', 'max:120'],
            'website' => ['nullable', 'max:120'],
            'tel' => ['nullable', 'max:50'],
            'tel_alt' => ['nullable'],
            'street_address' => ['nullable'],
            'city' => ['nullable'],
            'county' => ['nullable'],
            'post_code' => ['nullable'],
        ]));

        return redirect()->route('customer.show', $customer->id);;
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back();
    }
}
