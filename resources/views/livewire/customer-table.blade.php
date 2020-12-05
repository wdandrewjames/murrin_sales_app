<div class="space-y-4">
    <input wire:model="search" type="text" name="search" id="search" class="px-2 my-4 border rounded-full" placeholder="Search...">
    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        <x-table>
            <x-slot name="head">
                <x-head x-on:click="open = !open">Name</x-head>
                <x-head>Email</x-head>
                <x-head>Website</x-head>
                <x-head>Tel</x-head>
                <x-head>Status</x-head>
                @if (Auth::user()->business_id === null)
                <x-head>Edit</x-head>
                <x-head>Delete</x-head>
                @endif
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
                        @if (Auth::user()->business_id === null)
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <a href="{{ route('customer.edit', $customer) }}">Edit</a>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <button name="open_modal_button" data-id="{{ $customer->id }}" class="text-white bg-red-600 btn">Delete</button>
                        </td>
                        @endif
                    </x-row>
                @endforeach
            </x-slot>
        </x-table>
    </div>
    <div class="my-4">
        {{ $customers->links() }}
    </div>
</div>

<x-modal>
    <x-slot name="openLink">
        <button class="px-4 py-2 text-white bg-red-500 btn" >Delete</button>
    </x-slot>

    <x-slot name="modalTitle">
        Are you sure you want to delete this Customer.
    </x-slot>

    <x-slot name="modalBody">
        Deleteing this customer will also delete all the data associated with this customer including orders & notes.  
    </x-slot>

    <x-slot name="actionLink">
        <form method="POST" name="delete_customer_form">
            @method('delete')
            @csrf
            <button id="action_button" type="submit" class="px-4 py-2 text-white bg-red-500 btn" >Delete</button>
        </form>
    </x-slot>
</x-modal>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.delete_customer_form.addEventListener('submit', function(e) {
            e.preventDefault();
            this.action = '/customers/' + document.getElementById('modal').getAttribute('data-id');
            this.submit();
        })
    });
</script>