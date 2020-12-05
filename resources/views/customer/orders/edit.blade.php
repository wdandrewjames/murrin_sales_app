<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Customer Order
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="px-4 py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg md:px-4 md:py-4">
                <div class="col-span-12">
                    <div class="flex flex-col">
                        <div class="flex flex-col px-5 py-6">
                            <div class="grid grid-cols-1 xl:grid-cols-7">
                                <div class="col-span-2 sm:pr-2">
                                    <h3 class="mb-2 text-xl font-normal tracking-wide text-gray-800">Editing a Customer
                                        Order for {{ $customer->name }}</h3>
                                    
                                </div>

                                <div class="col-span-1 pt-4 lg:pt-0 lg:pl-4 lg:col-span-5">
                                    <form action="{{ route('customers.order.update', [$customer, $order]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-span-1 pt-4 lg:pt-0 lg:pl-4 lg:col-span-2">
                                            <div class="grid grid-cols-1 lg:grid-cols-3">
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="amount" class="label">Order Value</label>
                                                    <input type="text" name="amount" id="amount" class="input" value="{{ $order->amount / 100 }}"
                                                        placeholder="234.00" autofocus>
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="invoice_number" class="label">Invoice Number</label>
                                                    <input type="text" name="invoice_number" id="invoice_number" value="{{ $order->invoice_number }}"
                                                        class="input" placeholder="123-645">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="invoice_date" class="label">Invoice Date</label>
                                                    <input type="date" name="invoice_date" id="invoice_date" value="{{ $order->invoice_date }}"
                                                        class="input" placeholder="2020-10-26">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                            </div>

                                            <button type="submit" class="w-full mx-2 my-4 btn btn-primary md:w-auto">
                                                Create Order
                                            </button>

                                            @if ($errors->any())
                                                <div class="p-4 text-red-900 bg-red-200 border-red-500 rounded-lg">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
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
