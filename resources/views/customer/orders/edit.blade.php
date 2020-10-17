<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Customer Order
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-4 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg md:px-4 md:py-4">
                <div class="col-span-12">
                    <div class="flex flex-col">
                        <div class="px-5 py-6 flex flex-col">
                            <div class="grid grid-cols-1 xl:grid-cols-7">
                                <div class="sm:pr-2 col-span-2">
                                    <h3 class="mb-2 font-normal text-xl tracking-wide text-gray-800">Editing a Customer
                                        Order for {{ $customer->name }}</h3>
                                    
                                </div>

                                <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-5">
                                    <form action="{{ route('customers.order.update', [$customer, $order]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-2">
                                            <div class="grid grid-cols-1 lg:grid-cols-3">
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="amount" class="label">Order Value</label>
                                                    <input type="text" name="amount" id="amount" class="input" value="{{ $order->amount }}"
                                                        placeholder="234.00" autofocus>
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="invoice_number" class="label">Invoice Number</label>
                                                    <input type="text" name="invoice_number" id="invoice_number" value="{{ $order->invoice_number }}"
                                                        class="input" placeholder="123-645">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="invoice_date" class="label">Invoice Date</label>
                                                    <input type="date" name="invoice_date" id="invoice_date" value="{{ $order->invoice_date }}"
                                                        class="input" placeholder="2020-10-26">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-full md:w-auto mx-2 my-4">
                                                Create Order
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
