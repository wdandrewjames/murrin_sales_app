<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Businesses
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
            <div class="flex ml-auto">
                <a href="{{ route('appointments.index') }}" class="btn btn-primary ml-auto mr-3 mb-4 inline-block font-semibold">View Appointments</a>
                <a href="{{ route('business.create') }}" class="btn btn-primary ml-auto mr-3 mb-4 inline-block font-semibold">Add Business</a>
            </div>
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
            <div class="my-4">
                {{ $businesses->links() }}
            </div>
        </div>
    </div>

    
</x-app-layout>