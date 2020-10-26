<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Businesses
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col">
            <div class="flex ml-auto">
                <a href="{{ route('appointments.index') }}" class="btn btn-primary ml-auto mr-3 mb-4 inline-block font-semibold">View Appointments</a>
                <a href="{{ route('business.create') }}" class="btn btn-primary ml-auto mr-3 mb-4 inline-block font-semibold">Add Business</a>
            </div>
            {{-- livewire table --}}
            <livewire:business-table />
            
        </div>
    </div>

    
</x-app-layout>