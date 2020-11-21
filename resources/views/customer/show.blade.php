<x-app-layout >

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
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col">
            @if (Auth::user()->business_id == null)
            <div class="flex items-center flex-wrap rounded-lg bg-white shadow-lg md:shadow mt-2 p-3 mb-4">
                    <div class="">
                        <form action="{{ route('status.update', $customer) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select class="py-2" name="status_id" id="status_id">
                                @foreach ($statuses as $status)
                                    <option {{ $customer->status->id == $status->id ? 'selected' : '' }} value="{{ $status->id }}" class="">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                

                
                <div class="hidden md:flex ml-2 mt-2 sm:mt-0 md:ml-auto items-center justify-center ">
                    <a href="{{ route('customers.order.create', $customer) }}" class="btn btn-primary mr-3 inline-block font-semibold">Create Order</a>
                    <a href="{{ route('customers.appointment.create', $customer) }}" class="btn btn-primary mr-3 inline-block font-semibold">Make Appointment</a>
                    <a href="{{ route('customers.note.index', $customer) }}" class="btn btn-primary mr-3 inline-block font-semibold">Notes</a>
                </div>
                <div class="relative top-0 md:hidden ml-auto">
                    <div x-on:click="buttonOpen = ! buttonOpen" class="btn btn-primary">Action</div>
                    <div x-cloak x-show="buttonOpen"class="bg-white mt-3 text-gray-800 rounded-lg absolute overflow-hidden shadow-md right-0 z-20 w-32 border-gray-300 border-1">
                        <a class="block border-b p-2 hover:bg-indigo-200" href="{{ route('customers.order.create', $customer) }}">Create Order</a>
                        <a class="block border-b p-2 hover:bg-indigo-200" href="{{ route('customers.appointment.create', $customer) }}">Make Appointment</a>
                        <a class="block border-b p-2 hover:bg-indigo-200" href="{{ route('customers.note.index', $customer) }}">Notes</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg lg:p-6">
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
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->invoice_date->format('d/m/Y') }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->invoice_number }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">£{{ number_format($order->amount / 100, 2) }}</div>
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
