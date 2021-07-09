<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $business->name }}
            </h2>

            {{-- only admin can use this --}}
            @if (Auth::user()->business_id == null)
                <a href="{{ route('customer.create', $business) }}" class="ml-auto btn btn-primary mr-3 inline-block font-semibold">Add Customer</a>
            @endif

        </div>
    </x-slot>

    <x-breadcrumb :links="$breadcrumbs_links" />

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col bg-white rounded-lg py-6">

            {{-- nav --}}
            <div class="flex border-b font-bold text-gray-500 w-full tracking-wide">
                <a href="{{ route('business.show', $business) }}" class="mx-3 {{ request()->routeIs('business.show', $business) ? 'text-indigo-600 font-bolder border-b-2 border-indigo-600' : ''}}">Customers</a >
                <a href="{{ route('business.order.index', $business) }}" class="mx-3 {{ request()->routeIs('business.order.index') ? 'text-indigo-600 font-bolder border-b-2 border-indigo-600' : ''}}">Orders</a>
                <a href="{{ route('summary.index', $business) }}" class="mx-3 {{ request()->routeIs('summary.index') ? 'text-indigo-600 font-bolder border-b-2 border-indigo-600' : ''}}">Summary</a>
                <a class="ml-auto mx-3">Action</a>
            </div>

            {{-- <x-jet-nav-link  :active="request()->routeIs('business.index')">
                Businesses --}}
            {{-- </x-jet-nav-link> --}}


            {{-- <div class=" ml-auto flex">
                @if (Auth::user()->business_id == null)
                    <form action="{{ route('manual_user.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="business_id" value="{{ $business->id }}">
                        <button type="submit" class="btn bg-green-500 text-gray-100 mr-3 mb-4 inline-block font-semibold shadow-lg">Create Client Account</button>
                    </form>
                @endif

                <a href="{{ route('business.order.index', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">View Orders</a>
                
                
                
                <a href="{{ route('summary.index', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">View Summary</a>

                <a href="{{ route('business.edit', $business) }}" class="btn btn-primary mr-3 mb-4 inline-block font-semibold">Edit</a>
                
                <button name="open_modal_button" data-id="{{ $business->id }}" class="btn mr-3 mb-4 inline-block font-semibold bg-red-600 text-white">Delete</button>
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
            @endif --}}

            {{-- livewire customer table --}}
            {{-- <livewire:customer-table :business="$business"/> --}}

            
                        <div class="px-6 py-4 whitespace-no-wrap">
                            
                        </div>
            
            <livewire:new-customer-table :business="$business"/>
        </div>
    </div>

    <x-modal>
        <x-slot name="openLink">
            <button class="px-4 py-2 text-white bg-red-500 btn" >Delete</button>
        </x-slot>
    
        <x-slot name="modalTitle">
            Are you sure you want to delete this business.
        </x-slot>
    
        <x-slot name="modalBody">
            Deleteing this business will also delete all the data associated with this business including orders, customers and reports.  
        </x-slot>
    
        <x-slot name="actionLink">
            <form method="POST" name="delete_business_form">
                @method('delete')
                @csrf
                <button id="action_button" type="submit" class="px-4 py-2 text-white bg-red-500 btn" >Delete</button>
            </form>
        </x-slot>
    </x-modal>
</x-app-layout>