<x-app-layout>

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Businesses
            </h2>
            <a href="{{ route('business.create') }}" class="btn btn-primary ml-auto inline-block font-semibold">Add Business</a>
        </div>
    </x-slot>
    
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col bg-white rounded-lg py-6">
            <livewire:new-business-table />
        </div>
    </div>

    
</x-app-layout>