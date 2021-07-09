<?php

namespace App\Http\Livewire;

use App\Models\Business;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class NewBusinessTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Contact Number', 'tel')
                ->sortable()
                ->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Business::query();
    }
    
    public function getTableRowUrl($row): string
    {
        // dd($row->id);
        return route('business.show', $row);
    }

}
