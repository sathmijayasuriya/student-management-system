@props(['items' => []])

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
        @foreach ($items as $index => $item)
            @if (isset($item['url']) && !$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $item['label'] }}
                </li>
            @endif
        @endforeach
    </ol>
</nav>
