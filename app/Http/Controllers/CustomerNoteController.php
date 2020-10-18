<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Note;
use Illuminate\Http\Request;

class CustomerNoteController extends Controller
{
    public function index(Customer $customer)
    {
        $data = [
            'breadcrumbs_links' => [
                'Businesses' => route('business.index'), 
                $customer->business->name => route('business.show', $customer->business),
                $customer->name => route('customer.show', $customer),
                'Notes' => route('customers.note.index', $customer),
            ],
            'customer' => $customer,
            'notes' => $customer->notes()->orderBy('created_at', 'desc')->paginate(10),
        ];

        return view('customer.notes.index', $data);
    }
    

    public function store(Customer $customer)
    {
        $validatedData = request()->validate([
            'content' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['customer_id'] = $customer->id;

        Note::create($validatedData);

        return redirect()->route('customers.note.index', $customer);
    }
}
