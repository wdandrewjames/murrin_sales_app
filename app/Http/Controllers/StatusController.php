<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function update(Customer $customer)
    {
        $customer->update(request()->validate([
            'status_id' => 'exists:statuses,id'
        ]));

        return redirect()->back();
    }
}
