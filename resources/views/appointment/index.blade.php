<x-app-layout>

    <x-slot name="header">
        <div class="flex">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Phone Appointments
                </h2>
                <div class="text-sm text-gray-500">{{ now()->format('D d M Y') }}</div>
            </div>
        </div>

    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-12">    
                </div>
                
                {{-- orders --}}
                <div class="my-6">
                    <h4 class="text-xl text-gray-600 mb-2 pl-2">Appointments</h4>
                    <x-table class="">
                        <x-slot name="head">
                            <x-head>Date</x-head>
                            <x-head>Customer</x-head>
                            <x-head>Company</x-head>
                            <x-head>Telephone</x-head>
                            <x-head>Tel Alt.</x-head>
                            <x-head>Mark Complete</x-head>
                        </x-slot>
                        <x-slot name="body">
                            @foreach ($appointments as $appointment)
                                <x-row>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $appointment->start }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $appointment->customer->name }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $appointment->customer->company_name }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $appointment->customer->tel }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $appointment->customer->tel_alt ? : 'N/A' }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">
                                            <livewire:appointment-complete :appointmentId="$appointment->id">
                                        </div>
                                    </td>     
                                </x-row>
                            @endforeach
                        </x-slot>
                    </x-table>
                </div>
                <div class="my-4">
                    {{-- {{ $orders->links() }} --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
