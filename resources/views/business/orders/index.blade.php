<x-app-layout>

    <x-slot name="header">
        <div class="flex">
            <div class="">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Orders
                </h2>
            </div>
        </div>

    </x-slot>

    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 bg-white rounded-lg py-6">

            {{-- nav --}}
            <div class="flex border-b font-bold text-gray-500 w-full tracking-wide">
                <a href="{{ route('business.show', $business) }}" class="mx-3 {{ request()->routeIs('business.show', $business) ? 'text-indigo-600 font-bolder border-b-2 border-indigo-600' : ''}}">Customers</a >
                <a href="{{ route('business.order.index', $business) }}" class="mx-3 {{ request()->routeIs('business.order.index') ? 'text-indigo-600 font-bolder border-b-2 border-indigo-600' : ''}}">Orders</a>
                <a href="{{ route('summary.index', $business) }}" class="mx-3 {{ request()->routeIs('summary.index') ? 'text-indigo-600 font-bolder border-b-2 border-indigo-600' : ''}}">Summary</a>
                <a class="ml-auto mx-3">Action</a>
            </div>

            <div class="overflow-hidden">
                {{-- orders --}}
                <div class="my-6">
                    <div class="block mb-2 md:flex md:items-center">
                        <h4 class="pl-2 mb-2 text-xl text-gray-600">Orders for {{ $business->name }}</h4>
                        <div class="ml-auto">
                            <form class="flex flex-wrap md:space-x-2">
                                <input type="datetime-local" name="start" class="w-2/5 mr-2 input md:w-auto" value="{{ request()->get('start') }}">
                                <input type="datetime-local" name="end" class="w-2/5 input md:w-auto" value="{{ request()->get('end') }}">
                                <button class="m-2 btn btn-primary md:ml-0">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="block mb-2 ml-2 space-x-4 text-sm text-gray-600 md:flex">
                        <div class="">Total: £{{ $orders_total }}</div>
                        <div class="">Average: £{{ $orders_average }}</div>
                    </div>
                    <x-table class="">
                        <x-slot name="head">
                            <x-head>Date</x-head>
                            <x-head>Invoice No.</x-head>
                            <x-head>Total</x-head>
                            <x-head>Customer</x-head>
                            <x-head>Business</x-head>
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
                                        <div class="text-sm leading-5 text-gray-900">£{{ $order->formatAmount }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->customer->name }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->customer->company_name }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $order->user->name }}</div>
                                    </td>     
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900"><a href="{{ route('customers.order.edit', [$order->customer, $order] ) }}">Edit</a></div>
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
