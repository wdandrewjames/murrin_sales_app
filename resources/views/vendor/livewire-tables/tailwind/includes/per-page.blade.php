@if ($paginationEnabled && $showPerPage)
    <div class="w-full md:w-auto">
        <select
            wire:model="perPage"
            id="perPage"
            class="rounded-md shadow-sm block w-full pl-3 pr-10 py-2 text-base leading-6 border bg-gray-100 border-gray-300 appearance-none focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo sm:text-sm sm:leading-5"
        >
            @foreach ($perPageAccepted as $item)
                <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
            @endforeach
        </select>
    </div>
@endif
