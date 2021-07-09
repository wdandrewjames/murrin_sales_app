<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class NewCustomerTable extends DataTableComponent
{
    public $business;

    public string $defaultSortColumn = 'company_name';
    
    public string $defaultSortDirection = 'asc';

    public bool $singleColumnSorting = true;

    public function columns(): array
    {
        return [
            Column::make('Company', 'company_name')
                ->sortable()
                ->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Contact Number', 'tel')
                ->sortable()
                ->searchable(),
            Column::make('Status', 'statuses.name')
        ];
    }

    public function query(): Builder
    {
        return Customer::query()
            ->where('business_id', $this->business->id)
            ->when($this->getFilter('status'), fn ($query, $status) => $query->join('statuses', 'customers.status_id', '=', 'statuses.id')->where('statuses.name', $status));
    }
    
    public function getTableRowUrl($row): string
    {
        return route('customer.show', $row);
    }

    public function rowView(): string
    {
        return 'business.row';
    }

    public function filters(): array
    {
        return [
            'status' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    'Current Customer' => 'Current Customer',
                    'Prospect' => 'Prospect',
                    'Third Party Buyer' => 'Third Party Buyer',
                    'No Status' => 'No Status',
                ]),
        ];
    }
}
