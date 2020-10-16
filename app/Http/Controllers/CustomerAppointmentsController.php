<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Appointment;
use Illuminate\Http\Request;

class CustomerAppointmentsController extends Controller
{
    public function create(Customer $customer)
    {
        $data = [
            'customer' => $customer,
            'breadcrumbs_links' => [
                'Businesses' => route('business.index'), 
                $customer->business->name => route('business.show', $customer->business),
                $customer->name => route('customer.show', $customer),
                'Create Phone Appointment' => route('customers.appointment.create', $customer),
            ]
        ];

        return view('customer.appointments.create', $data);
    }

    public function store(Customer $customer)
    {
        $validatedData = request()->validate([
            'start' => 'required|date_format:d/m/Y H:i',
        ]);

        $validatedData['customer_id'] = $customer->id;

        Appointment::create($validatedData);

        return redirect()->route('customer.show', $customer);
    }
}
