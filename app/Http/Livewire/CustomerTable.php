<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerTable extends Component
{
    public $business;
    public $search;

    public function render()
    {
        return view('livewire.customer-table', ['customers' => $this->business->customers()->search('name', $this->search)->orderBy('name')->paginate(10)]);
    }
}
