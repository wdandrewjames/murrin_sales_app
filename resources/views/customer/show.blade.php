<x-app-layout>

    <x-slot name="header">
        <div class="flex">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $customer->name }}
                </h2>
                <div class="text-sm text-gray-500">{{ $customer->business->name }}</div>
            </div>
            <div
                class="shadow-sm px-2 ml-auto h-6 flex text-xs leading-5 font-semibold rounded-full items-center border border-{{ $customer->status->color }}-200 bg-{{ $customer->status->color }}-100 text-{{ $customer->status->color }}-800">
                {{ $customer->status->name }}</div>
        </div>


    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-12">

                    {{-- customer information --}}
                    <div class="col-span-4 mr-2">
                        <div class="px-4 py-6 border border-gray-200 rounded-lg flex items-center shadow-sm">
                            <div class="text-left ml-4">
                                <h2 class="text-lg">{{ $customer->name }}</h2>
                                <div class="text-purple-500">{{ $customer->job_title }} @ <span
                                        class="text-gray-800">{{ $customer->company_name }}</span></div>
                                <div class="pt-1 text-gray-600">{{ $customer->email }}</div>
                                <div class="text-gray-600">{{ $customer->website }}</div>
                                <div class="pt-1 text-sm text-gray-600">{{ $customer->tel }}</div>
                                <div class="text-sm text-gray-600">{{ $customer->tel_alt }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- customer order stats --}}
                    <div class="col-span-4 mx-2">
                        <div class="px-4 py-6 border border-gray-200 rounded-lg flex items-center shadow-sm h-full">
                            <div class="text-left ml-4 w-full">
                                <h2 class="text-lg">2 Order this Month</h2>
                                <div class="text-purple-500">26 <span
                                        class="text-gray-800">orders 12-months</span></div>
                                <div class="flex flex-wrap justify-around w-full">
                                    <a href="{{ route('customers.order.create', $customer) }}" class="btn btn-primary">Create Order</a>
                                    <a href="{{ route('customers.appointment.create', $customer) }}" class="btn btn-primary">Create Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- customer order stats --}}
                    <div class="col-span-4 ml-2">
                        <div class="px-4 py-6 border border-gray-200 rounded-lg flex items-center shadow-sm h-full">
                            <div class="text-left ml-4 w-full">
                                <h2 class="text-lg">Change Status</h2>
                                <form action="{{ route('status.update', $customer) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_id" id="status_id">
                                        @foreach ($statuses as $status)
                                            <option {{ $customer->status->id == $status->id ? 'selected' : '' }} value="{{ $status->id }}" class="">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                {{-- orders --}}
                <div class="my-6">
                    <h4 class="text-xl text-gray-600 mb-2 pl-2">Orders for {{ $customer->name }}</h4>
                    <x-table class="">
                        <x-slot name="head">
                            <x-head>Date</x-head>
                            <x-head>Invoice No.</x-head>
                            <x-head>Total</x-head>
                            <x-head>Sales Rep</x-head>
                            <x-head>Edit</x-head>
                        </x-slot>
                        <x-slot name="body">
                            @foreach ($orders as $order)
                                <x-row>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->invoice_date }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->invoice_number }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">£{{ $order->amount }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->user->name }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900"><a href="{{ route('customers.order.edit', [$customer, $order]) }}">Edit</a></div>
                                    </td>     
                                </x-row>
                            @endforeach
                        </x-slot>
                    </x-table>
                </div>
                <div class="my-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
