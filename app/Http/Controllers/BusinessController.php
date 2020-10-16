<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $data = [
            'breadcrumbs_links' => ['Businesses' => route('business.index')],
            'businesses' => Business::paginate(10),
        ];
        return view('business.index', $data);
    }

    public function show(Business $business)
    {
        $data = [
            'business' => $business,
            'customers' => $business->customers()->paginate(10),
            'breadcrumbs_links' => ['Businesses' => route('business.index'), $business->name => route('business.show', $business)],
        ];

        return view('business.show', $data);
    }

    public function create()
    {
        return view('business.create', ['breadcrumbs_links' => ['Businesses' => route('business.index'), 'Add Business' => route('business.create')]]);
    }

    public function store()
    {
        $business = Business::create(
            request()->validate([
                'name' => ['required', 'max:60'],
                'contact_name' => ['required', 'max:60'],
                'email' => ['required', 'max:120', 'email'],
                'tel' => ['required', 'max:50'],
                'tel_alt' => ['present'],
            ])
        );

        return Redirect()->route('business.show', $business->id);
    }

    public function edit(Business $business)
    {
        $data = [
            'business' => $business,
            'breadcrumbs_links' => ['Businesses' => route('business.index'), $business->name => route('business.show', $business), 'Edit Business' => route('business.edit', $business)],
        ];
        return view('business.edit', $data);
    }

    public function update(Business $business)
    {
        $business->update(
            request()->validate([
                'name' => ['required', 'max:60'],
                'contact_name' => ['required', 'max:60'],
                'email' => ['required', 'max:120', 'email'],
                'tel' => ['required', 'max:50'],
                'tel_alt' => ['present'],
            ])
        );

        return Redirect()->route('business.show', $business->id);
    }
}
