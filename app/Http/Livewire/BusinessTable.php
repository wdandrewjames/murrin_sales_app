<?php

namespace App\Http\Livewire;

use App\Models\Business;
use Livewire\Component;
use Livewire\WithPagination;

class BusinessTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.business-table', ['businesses' => Business::search('name', $this->search)->orderBy('name')->paginate(10)]);
    }
}
