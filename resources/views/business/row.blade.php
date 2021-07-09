<x-livewire-tables::table.cell>
    {{ ucfirst($row->company_name) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->email }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->tel }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <span title="{{ $row->status->description }}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $row->status->color }}-100 text-{{ $row->status->color }}-800">
        {{ $row->status->name }}
    </span>
</x-livewire-tables::table.cell>

