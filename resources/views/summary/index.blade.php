<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $business->name }} Yearly Summary
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-table>
                    {{-- table headers looping through upto last 12-months --}}
                    <x-slot name="head">
                        <x-head>Status</x-head>
                        @foreach ($dates as $date => $count)
                            <x-head>{{ $date }}</x-head>
                        @endforeach
                    </x-slot>

                    <x-slot name="body">
                        @foreach ($counts as $status => $values)
                            <x-row>
                                <td class="px-6 py-4 whitespace-no-wrap flex items-center">
                                    <div class="rounded-full h-4 w-4 border-{{ \App\Models\Status::find($status)->color }}-800 mr-2 bg-{{ \App\Models\Status::find($status)->color }}-500"></div>
                                    {{ \App\Models\Status::find($status)->name }}
                                </td>
                                @foreach ($values as $count)
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $count->count }}</td>
                                @endforeach
                            </x-row>
                        @endforeach
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>