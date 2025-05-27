<!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
@props(['items' => []])

<nav class="text-xl text-gray-600 mb-4" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        @foreach ($items as $index => $item)
            @if (isset($item['url']))
                <li>
                    <a href="{{ $item['url'] }}" class="text-grey-600 hover:underline">{{ $item['label'] }}</a>
                    @if (!$loop->last)
                        <span class="mx-2">/</span>
                    @endif
                </li>
            @else
                <li class="text-gray-500">{{ $item['label'] }}</li>
            @endif
        @endforeach
    </ol>
</nav>