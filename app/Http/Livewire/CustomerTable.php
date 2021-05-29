<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerTable extends Component
{
    public $business;
    public $search;

    public function render()
    {
        return view('livewire.customer-table', ['customers' => $this->business->customers()->search('company_name', $this->search)->orderBy('company_name')->paginate(10)]);
    }
}
