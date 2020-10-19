<div class="space-y-4">
    <input wire:model="search" type="text" name="search" id="search" class="border rounded-full px-2 my-4" placeholder="Search...">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <x-table>
            <x-slot name="head">
                <x-head x-on:click="open = !open">Name</x-head>
                <x-head>Email</x-head>
                <x-head>Website</x-head>
                <x-head>Tel</x-head>
                <x-head>Status</x-head>
            </x-slot>
            <x-slot name="body">
                @foreach ($customers as $customer)
                    <x-row>
                        <td class="px-6 py-4 whitespace-no-wrap"><a href="{{ route('customer.show', $customer->id) }}">{{ $customer->name }}</a></td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $customer->email }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $customer->website }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $customer->tel }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <span title="{{ $customer->status->description }}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $customer->status->color }}-100 text-{{ $customer->status->color }}-800">
                                {{ $customer->status->name }}
                            </span>
                          </td>
                    </x-row>
                @endforeach
            </x-slot>
        </x-table>
    </div>
    <div class="my-4">
        {{ $customers->links() }}
    </div>
</div>