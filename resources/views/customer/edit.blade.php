<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Customer Info
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
                                    <h3 class="mb-2 font-normal text-xl tracking-wide text-gray-800">Editing a New
                                        Customer</h3>
                                    <p class="font-light text-sm opacity-75 tracking-wide text-gray-800">Editing customer information for {{ $customer->name }} from {{ $customer->business->name }}</p>
                                </div>

                                <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-5">
                                    <form action="{{ route('customer.store', $customer->business) }}" method="POST">
                                        @csrf
                                        <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-2">
                                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="company_name" class="label">Company Name</label>
                                                    <input type="text" name="company_name" id="company_name" value="{{ $customer->company_name }}"
                                                        class="input" placeholder="Name of the Company"
                                                        autofocus>
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="name" class="label">Name</label>
                                                    <input type="text" name="name" id="name" class="input" value="{{ $customer->name }}"
                                                        placeholder="Name of the main contact">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="email" class="label">Email Address</label>
                                                    <input type="text" name="email" id="email" class="input" value="{{ $customer->email }}"
                                                        placeholder="john.doe@example.com">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="website" class="label">Website</label>
                                                    <input type="text" name="website" id="website" class="input" value="{{ $customer->website }}"
                                                        placeholder="www.example.com">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 lg:grid-cols-12">
                                                <div class="flex flex-col lg:mx-2 lg:col-span-6">
                                                    <label for="job_title" class="label">Job Title</label>
                                                    <input type="text" name="job_title" id="job_title" class="input" value="{{ $customer->job_title }}"
                                                        placeholder="Director...">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2 col-span-3">
                                                    <label for="tel" class="label">Tel</label>
                                                    <input type="text" name="tel" id="tel" class="input" value="{{ $customer->tel }}"
                                                        placeholder="Contect Number">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2 col-span-3">
                                                    <label for="tel_alt" class="label">Alt. Tel</label>
                                                    <input v-model="form.tel_alt" type="text" name="tel_alt" value="{{ $customer->tel_alt }}"
                                                        id="tel_alt" class="input" placeholder="Alt. Contact Number">
                                                </div>
                                                <div class="flex flex-col lg:mx-2 lg:col-span-4">
                                                    <label for="street_address" class="label">Street Address</label>
                                                    <input type="text" name="street_address" id="street_address" value="{{ $customer->street_address }}"
                                                        class="input" placeholder="14 Westside St..">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2 col-span-3">
                                                    <label for="city" class="label">City</label>
                                                    <input type="text" name="city" id="city" class="input" value="{{ $customer->city }}"
                                                        placeholder="Exeter">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2 col-span-3">
                                                    <label for="county" class="label">County</label>
                                                    <input type="text" name="county" id="county" class="input" value="{{ $customer->county }}"
                                                        placeholder="Devon">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2 col-span-2">
                                                    <label for="post_code" class="label">Post Code</label>
                                                    <input type="text" name="post_code" id="post_code" class="input" value="{{ $customer->post_code }}"
                                                        placeholder="EX6 8HP">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-full md:w-auto mx-2 my-4">Add
                                                Customer
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
