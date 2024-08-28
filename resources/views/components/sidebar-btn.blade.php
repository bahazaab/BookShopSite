<a
    {{ $attributes->merge(['class' => 'block px-4 py-2 rounded-md text-base font-medium hover:bg-gray-100 hover:text-gray-800 flex items-center space-x-2 transition-colors duration-200 ' . ($active ? 'bg-gray-200 text-gray-800' : 'text-gray-500')]) }}
>

    @if (isset($icon))
        <i class="{{ $icon }} "></i>
    @endif

    <span class="px-3"></span>
    <span>
        {{ $title }}
    </span>
</a>
