<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $business->name }} Yearly Summary
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-table>
                    {{-- table headers looping through upto last 12-months --}}
                    <x-slot name="head">
                        <x-head>Status</x-head>
                        @foreach ($dates as $date)
                            <x-head>{{ $date }}</x-head>
                        @endforeach
                    </x-slot>

                    <x-slot name="body">
                        @foreach ($summaries as $statusId => $values)
                            <x-row>
                                <td class="px-6 py-4 whitespace-no-wrap flex items-center">
                                    <div class="rounded-full h-4 w-4 border-{{ $status[$statusId]['color'] }}-800 mr-2 bg-{{ $status[$statusId]['color'] }}-500"></div>
                                    {{ $status[$statusId]['name'] }}
                                </td>
                                @foreach ($values as $date => $count)
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $count }}</td>
                                @endforeach
                            </x-row>
                        @endforeach
                        <x-row class="font-bold">
                            <td class="px-6 py-4 whitespace-no-wrap flex items-center bg-gray-100">
                                <div class="rounded-full h-4 w-4 mr-2 bg-white-500"></div>
                                Total
                            </td>
                            @foreach ($totals as $date => $count)
                                <td class="px-6 py-4 bg-gray-100 whitespace-no-wrap">{{ $count }}</td>
                            @endforeach
                        </x-row>
                    </x-slot>
                </x-table>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
                <x-table>
                    {{-- table headers looping through upto last 12-months --}}
                    <x-slot name="head">
                        @foreach ($orders as $date => $amount)
                            <x-head>{{ $date }}</x-head>
                        @endforeach
                    </x-slot>

                    <x-slot name="body">
                        <x-row>
                            @foreach ($orders as $date => $amount)
                                <td class="px-6 py-4 whitespace-no-wrap">£{{ $amount }}</td>
                            @endforeach
                        </x-row>
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>