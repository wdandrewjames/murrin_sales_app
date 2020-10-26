<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Book a Phone Call
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
                                    <h3 class="mb-2 font-normal text-xl tracking-wide text-gray-800">Creating a New
                                        Appointemnt Call for {{ $customer->name }}</h3>
                                    <p class="font-light text-sm opacity-75 tracking-wide text-gray-800">Once the
                                        appointment has been created, you will be able to view the details on the customer's page and a notification email will be sent out each week.</p>
                                </div>

                                <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-5">
                                    <form action="{{ route('customers.appointment.store', $customer) }}" method="POST">
                                        @csrf
                                        <div class="pt-4 lg:pt-0 lg:pl-4 col-span-1 lg:col-span-2">
                                            <div class="grid grid-cols-1 lg:grid-cols-3">
                                                <div class="flex flex-col lg:mx-2">
                                                    <label for="start" class="label">Appointment Date and Time</label>
                                                    <input type="datetime-local" name="start" id="start" class="input" value="{{ old('start') }}"
                                                        placeholder="" autofocus>
                                                    <span class="text-xs text-red-600 my-1"></span>
                                                </div>
                                                
                                            </div>

                                            <button type="submit" class="btn btn-primary w-full md:w-auto mx-2 my-4">
                                                Create Appointment
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
