<nav class="text-black font-bold my-2 md:mt-4 max-w-7xl mx-auto py-2 md:py-2 px-4 sm:px-6 lg:px-8 text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex">
        @foreach($links as $name => $link)
        @if (! $loop->last)
            <li class="flex items-center">
                <a href="{{ $link }}">{{ $name }}</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path
                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                </svg>
            </li>
        @else
            <li>
                <div class="text-gray-500">{{ $name }}</a>
            </li>
            
        @endif
        @endforeach
    </ol>
</nav>
