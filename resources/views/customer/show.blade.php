<x-app-layout >

    <x-slot name="header">
        <div class="flex">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $customer->company_name }}
                </h2>
            </div>
            <div
                class="shadow-sm px-2 ml-auto h-6 flex text-xs leading-5 font-semibold rounded-full items-center border border-{{ $customer->status->color }}-200 bg-{{ $customer->status->color }}-100 text-{{ $customer->status->color }}-800">
                {{ $customer->status->name }}
            </div>
        </div>

    </x-slot>

    <x-breadcrumb :links="$breadcrumbs_links" />

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
                {{-- edit --}}

                <div class="col-span-12">
                    <div class="flex flex-col">
                        <div class="flex flex-col px-5 py-6">
                            <div class="grid grid-cols-1 xl:grid-cols-7">
                                <div class="col-span-2 sm:pr-2">
                                    <h3 class="mb-2 text-xl font-normal tracking-wide text-gray-800">Customer Information</h3>
                                    <p class="text-sm font-light tracking-wide text-gray-800 opacity-75">Editing customer information for {{ $customer->company_name }} from {{ $customer->business->name }}</p>
                                </div>

                                <div class="col-span-1 pt-4 lg:pt-0 lg:pl-4 lg:col-span-5">
                                    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-span-1 pt-4 lg:pt-0 lg:pl-4 lg:col-span-2">
                                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="company_name" class="label">Company Name</label>
                                                    <input type="text" name="company_name" id="company_name" value="{{ $customer->company_name }}"
                                                        class="input" placeholder="Name of the Company"
                                                        autofocus>
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="name" class="label">Name</label>
                                                    <input type="text" name="name" id="name" class="input" value="{{ $customer->name }}"
                                                        placeholder="Name of the main contact">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="email" class="label">Email Address</label>
                                                    <input type="text" name="email" id="email" class="input" value="{{ $customer->email }}"
                                                        placeholder="john.doe@example.com">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="website" class="label">Website</label>
                                                    <input type="text" name="website" id="website" class="input" value="{{ $customer->website }}"
                                                        placeholder="www.example.com">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 lg:grid-cols-12">
                                                <div class="flex flex-col lg:mx-2 lg:col-span-6">
                                                    <label for="job_title" class="label">Job Title</label>
                                                    <input type="text" name="job_title" id="job_title" class="input" value="{{ $customer->job_title }}"
                                                        placeholder="Director...">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col col-span-3 lg:mx-2">
                                                    <label for="tel" class="label">Tel</label>
                                                    <input type="text" name="tel" id="tel" class="input" value="{{ $customer->tel }}"
                                                        placeholder="Contect Number">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col col-span-3 lg:mx-2">
                                                    <label for="tel_alt" class="label">Alt. Tel</label>
                                                    <input v-model="form.tel_alt" type="text" name="tel_alt" value="{{ $customer->tel_alt }}"
                                                        id="tel_alt" class="input" placeholder="Alt. Contact Number">
                                                </div>
                                                <div class="flex flex-col lg:mx-2 lg:col-span-4">
                                                    <label for="street_address" class="label">Street Address</label>
                                                    <input type="text" name="street_address" id="street_address" value="{{ $customer->street_address }}"
                                                        class="input" placeholder="14 Westside St..">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col col-span-3 lg:mx-2">
                                                    <label for="city" class="label">City</label>
                                                    <input type="text" name="city" id="city" class="input" value="{{ $customer->city }}"
                                                        placeholder="Exeter">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col col-span-3 lg:mx-2">
                                                    <label for="county" class="label">County</label>
                                                    <input type="text" name="county" id="county" class="input" value="{{ $customer->county }}"
                                                        placeholder="Devon">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                                <div class="flex flex-col col-span-2 lg:mx-2">
                                                    <label for="post_code" class="label">Post Code</label>
                                                    <input type="text" name="post_code" id="post_code" class="input" value="{{ $customer->post_code }}"
                                                        placeholder="EX6 8HP">
                                                    <span class="my-1 text-xs text-red-600"></span>
                                                </div>
                                            </div>

                                            <button type="submit" class="w-full mx-2 my-4 btn btn-primary md:w-auto">
                                                Save
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

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg lg:p-6 mt-4">
                {{-- orders --}}
                <div class="my-6">
                    <h4 class="text-xl text-gray-600 mb-2 pl-2">Orders for {{ $customer->company_name }}</h4>
                    @if ($orders->count() > 0)
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
                    @else
                        <p class="pl-4 text-xl text-gray-500">There are no orders</p>
                    @endif
                    
                </div>
                <div class="my-4">
                    {{ $orders->links() }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg lg:p-6 mt-4">
                <div class="col-span-12">
                    <div class="flex flex-col">
                        <div class="px-5 py-6 flex flex-col">
                            <div class="grid grid-cols-1 xl:grid-cols-7">
                                <div class="sm:pr-2 col-span-2">
                                    <h3 class="mb-2 font-normal text-xl tracking-wide text-gray-800">Create Order</h3>
                                    <p class="font-light text-sm opacity-75 tracking-wide text-gray-800">Once the
                                        order has been created, you will be able to view the details on the customer's page and the business they're associated to.</p>
                                </div>

                                <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-5">
                                    <form action="{{ route('customers.order.store', $customer) }}" method="POST">
                                        @csrf
                                        <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-2">
                                            <div class="grid grid-cols-1 lg:grid-cols-3">
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="amount" class="label">Order Value</label>
                                                    <input type="text" name="amount" id="amount" class="input" value="{{ old('amount') }}"
                                                        placeholder="234.00" autofocus>
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="invoice_number" class="label">Invoice Number</label>
                                                    <input type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number') }}"
                                                        class="input" placeholder="123-645">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="invoice_date" class="label">Invoice Date</label>
                                                    <input type="date" name="invoice_date" id="invoice_date" value="{{ old('invoice_date') }}"
                                                        class="input" placeholder="2020-10-26">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-full md:w-auto mx-2 my-4">
                                                Create Order
                                            </button>

                                            @if ($errors->any())
                                                <div class="bg-red-200 border-red-500 text-red-900 rounded-lg p-4">
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
