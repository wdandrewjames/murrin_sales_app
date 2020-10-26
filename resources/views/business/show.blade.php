<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $business->name }}
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col">
            <div class=" ml-auto flex">
                <a href="{{ route('business.order.index', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">View Orders</a>
                <a href="{{ route('customer.create', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">Add Customer</a>
                <a href="{{ route('summary.index', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">View Summary</a>
            </div>
            {{-- livewire customer table --}}
            <livewire:customer-table :business="$business"/>
        </div>
    </div>

    
</x-app-layout>