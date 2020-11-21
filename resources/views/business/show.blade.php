<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $business->name }}
        </h2>
    </x-slot>
    <x-breadcrumb :links="$breadcrumbs_links"></x-breadcrumb>
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col">
            <div class=" ml-auto flex">
                @if (Auth::user()->business_id == null)
                    <form action="{{ route('manual_user.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="business_id" value="{{ $business->id }}">
                        <button type="submit" class="btn bg-green-500 text-gray-100 mr-3 mb-4 inline-block font-semibold shadow-lg">Create Client Account</button>
                    </form>
                @endif

                <a href="{{ route('business.order.index', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">View Orders</a>
                
                {{-- only admin can use this --}}
                @if (Auth::user()->business_id == null)
                    <a href="{{ route('customer.create', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">Add Customer</a>
                @endif
                
                <a href="{{ route('summary.index', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">View Summary</a>
            </div>
            @if (session('status'))
                <div class="max-w-md px-4 py-2 rounded-lg bg-green-100 text-green-800 border border-green-800">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="max-w-md px-4 py-2 rounded-lg bg-red-100 text-red-800 border border-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- livewire customer table --}}
            <livewire:customer-table :business="$business"/>
        </div>
    </div>

    
</x-app-layout>