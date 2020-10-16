<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add a Business
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg md:px-4 md:py-4">
                <div class="col-span-12">
                    <div class="flex flex-col">
                        <div class="px-5 py-6 flex flex-col">
                            <div class="grid grid-cols-1 xl:grid-cols-7">
                                <div class="sm:pr-2 col-span-2">
                                    <h3 class="mb-2 font-normal text-xl tracking-wide text-gray-800">Adding a New
                                        Business</h3>
                                    <p class="font-light text-sm opacity-75 tracking-wide text-gray-800">Once the
                                        businesses has been added, you will be able to manage its customers, orders and
                                        more.</p>
                                </div>

                                <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-5">
                                    <form action="{{ route('business.store') }}" method="POST">
                                        @csrf
                                        <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-2">
                                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="name" class="label">Company Name</label>
                                                    <input type="text" name="name" id="name" class="input" value="{{ old('name') }}"
                                                        placeholder="Name of the Company" autofocus>
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="contact_name" class="label">Contact Name</label>
                                                    <input type="text" name="contact_name" id="contact_name" value="{{ old('contact_name') }}"
                                                        class="input" placeholder="Name of the main contact">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 lg:grid-cols-4">
                                                <div class="flex flex-col lg:mx-2 lg:col-span-2">
                                                    <label for="email" class="label">Email Address</label>
                                                    <input type="text" name="email" id="email" class="input" value="{{ old('email') }}"
                                                        placeholder="Name of the Company">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2 col-span-1">
                                                    <label for="tel" class="label">Tel</label>
                                                    <input v-model="form.tel" type="text" name="tel" id="tel" value="{{ old('tel') }}"
                                                        class="input" placeholder="Contect Number">
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                <div class="flex flex-col lg:mx-2 col-span-1">
                                                    <label for="tel_alt" class="label">Alt. Tel</label>
                                                    <input type="text" name="tel_alt" id="tel_alt" class="input" value="{{ old('tel_alt') }}"
                                                        placeholder="Alt. Contact Number">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-full md:w-auto mx-2 my-4">
                                                Add Business
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
