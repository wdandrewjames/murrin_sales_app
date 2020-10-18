<x-app-layout>

    <x-slot name="header">
        <div class="flex">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Notes
                </h2>
                <div class="text-sm text-gray-500">{{ $customer->name }}</div>
            </div>
        </div>

    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                {{-- notes --}}
                <div class="space-y-5">
                    <h4 class="text-xl text-gray-600 mb-2 pl-2">Add Note</h4>
                    <form action="#" method="POST" class="space-y-2">
                        @csrf
                        <textarea name="content" id="content" rows="4" class="w-full border rounded-lg shadow-sm"></textarea>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    
                    <h4 class="text-xl text-gray-600 mb-2 pl-2">Notes for {{ $customer->name }}</h4>
                    
                    @foreach ($notes as $note)
                        <div class="border rounded-lg px-6 py-3">
                            <div class="text-md leading-5 text-gray-900">{{ $note->content }}</div>
                            <div class="text-sm leading-2 mt-2 text-cool-gray-500">{{ $note->created_at->format('d/m/Y') }} | {{ $note->created_at->diffForHumans() }}</div>
                        </div>
                    @endforeach
                        
                    <div class="">
                        {{ $notes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
