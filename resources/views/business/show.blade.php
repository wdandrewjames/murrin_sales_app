<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $business->name }}
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
            <div class=" ml-auto flex">
                <a href="{{ route('business.order.index', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">View Orders</a>
                <a href="{{ route('customer.create', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">Add Customer</a>
                <a href="{{ route('summary.index', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">View Summary</a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-table>
                    <x-slot name="head">
                        <x-head x-on:click="open = !open">Name</x-head>
                        <x-head>Age</x-head>
                        <x-head>Email</x-head>
                        <x-head>Status</x-head>
                    </x-slot>
                    <x-slot name="body">
                        @foreach ($customers as $customer)
                            <x-row>
                                <td class="px-6 py-4 whitespace-no-wrap"><a href="{{ route('customer.show', $customer->id) }}">{{ $customer->name }}</a></td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $customer->email }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $customer->website }}</td>
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
    </div>

    
</x-app-layout>