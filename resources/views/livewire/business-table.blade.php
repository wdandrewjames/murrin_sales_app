<div class="space-y-4">
    <input wire:model="search" type="text" name="search" id="search" class="border rounded-full px-2 my-4" placeholder="Search...">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <x-table>
            <x-slot name="head">
                <x-head>Company Name</x-head>
                <x-head>Contact Name</x-head>
                <x-head>Email</x-head>
                <x-head>Contact Numbers</x-head>
                <x-head>Edit</x-head>
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
                    </x-row>
                @endforeach
            </x-slot>
        </x-table>
    </div>
    <div class="my-4 px-2">
        {{ $businesses->links() }}
    </div>
</div>