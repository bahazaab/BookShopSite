<div class="mr-4">
    @if ($image != null)
        <div class="w-20 h-20 rounded-full overflow-hidden ml-4 mt-4">
            <img src="{{ $image }}" alt="{{ $text }}"
                class="w-full h-full object-cover">
        </div>
    @else
        <div
            class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
            {{ substr($text, 0, 1) }}
        </div>
    @endif
</div>