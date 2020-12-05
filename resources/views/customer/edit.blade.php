<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Customer Info
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
                                    <h3 class="mb-2 text-xl font-normal tracking-wide text-gray-800">Editing a New
                                        Customer</h3>
                                    <p class="text-sm font-light tracking-wide text-gray-800 opacity-75">Editing customer information for {{ $customer->name }} from {{ $customer->business->name }}</p>
                                </div>

                                <div class="col-span-1 pt-4 lg:pt-0 lg:pl-4 lg:col-span-5">
                                    <form action="{{ route('customer.update', $customer->business) }}" method="POST">
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
        </div>
    </div>
</x-app-layout>
