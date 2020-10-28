<x-app-layout>

    <x-slot name="header">
        <div class="flex">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Orders
                </h2>
                <div class="text-sm text-gray-500">{{ $business->name }}</div>
            </div>
        </div>


    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                {{-- orders --}}
                <div class="my-6">
                    <div class="block md:flex mb-2 md:items-center">
                        <h4 class="text-xl text-gray-600 mb-2 pl-2">Orders for {{ $business->name }}</h4>
                        <div class="ml-auto">
                            <form class="flex flex-wrap md:space-x-2">
                                <input type="datetime-local" name="start" class="input w-2/5 md:w-auto mr-2" value="{{ request()->get('start') }}">
                                <input type="datetime-local" name="end" class="input w-2/5 md:w-auto" value="{{ request()->get('end') }}">
                                <button class="btn btn-primary m-2 md:ml-0">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="ml-2 mb-2 block md:flex text-sm text-gray-600 space-x-4">
                        <div class="">Total: £{{ $orders_total }}</div>
                        <div class="">Average: £{{ $orders_average }}</div>
                    </div>
                    <x-table class="">
                        <x-slot name="head">
                            <x-head>Date</x-head>
                            <x-head>Invoice No.</x-head>
                            <x-head>Total</x-head>
                            <x-head>Customer</x-head>
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
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->customer->name }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->user->name }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900"><a href="">Edit</a></div>
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
