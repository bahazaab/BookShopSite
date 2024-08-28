@if (str_ends_with(Route::currentRouteName(), '.index'))
    <form action="{{ route(Route::currentRouteName()) }}" method="GET">
        @method('GET')

        <div class="flex justify-center h-12">
            <x-input type="search" name="search" />
            <x-button class="ml-3">Search</x-button>
        </div>
    </form>
@else
    <div></div>
@endif
