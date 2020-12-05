<div class="space-y-4">
    <input wire:model="search" type="text" name="search" id="search" class="px-2 my-4 border rounded-full" placeholder="Search...">
    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        <x-table>
            <x-slot name="head">
                <x-head>Company Name</x-head>
                <x-head>Contact Name</x-head>
                <x-head>Email</x-head>
                <x-head>Contact Numbers</x-head>
                <x-head>Edit</x-head>
                <x-head>Delete</x-head>
            </x-slot>
            <x-slot name="body">
                @foreach ($businesses as $business)
                    <x-row>
                        <td class="px-6 py-4 whitespace-no-wrap"><a href="{{ route('business.show', $business->id) }}">{{ $business->name }}</a></td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $business->contact_name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $business->email }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="text-sm leading-5 text-gray-900">{{ $business->tel }}</div>
                            <div class="text-sm leading-5 text-gray-500">{{ $business->tel_alt }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap"><a href="{{ route('business.edit', $business) }}">Edit</a></td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <button name="open_modal_button" data-id="{{ $business->id }}" class="text-white bg-red-600 btn">Delete</button>
                        </td>
                    </x-row>
                @endforeach
            </x-slot>
        </x-table>
    </div>
    <div class="px-2 my-4">
        {{ $businesses->links() }}
    </div>
</div>

<x-modal>
    <x-slot name="openLink">
        <button class="px-4 py-2 text-white bg-red-500 btn" >Delete</button>
    </x-slot>

    <x-slot name="modalTitle">
        Are you sure you want to delete this business.
    </x-slot>

    <x-slot name="modalBody">
        Deleteing this business will also delete all the data associated with this business including orders, customers and reports.  
    </x-slot>

    <x-slot name="actionLink">
        <form method="POST" name="delete_business_form">
            @method('delete')
            @csrf
            <button id="action_button" type="submit" class="px-4 py-2 text-white bg-red-500 btn" >Delete</button>
        </form>
    </x-slot>
</x-modal>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.delete_business_form.addEventListener('submit', function(e) {
            e.preventDefault();
            this.action = '/businesses/' + document.getElementById('modal').getAttribute('data-id');
            this.submit();
        })
    });
</script>