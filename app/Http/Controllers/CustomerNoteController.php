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
    
    public function create(Customer $customer)
    {
        $data = [
            'notes' => $customer->notes()->paginate(10),
        ];

        return view('customer.notes.index', $data);
    }

    public function store(Customer $customer)
    {
        $data = [
            'notes' => $customer->notes()->paginate(10),
        ];

        return view('customer.notes.index', $data);
    }
}
