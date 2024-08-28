@props(['title' => '', 'name' => '', 'xonclick' => ''])

{{-- <x-button x-on:click="show = true {{ $xonclick }}" type="button" x-bind:disabled="buttonDisabled">{{ $button }}</x-button> --}}

<div class="fixed z-10 inset-0 overflow-y-auto" style="display: none" x-show="show"
    x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="flex items-center justify-center min-h-screen text-center sm:p-0">
        <div class="relative overflow-hidden bg-white rounded-lg shadow dark:bg-gray-700">
            
            <div class="text-center">
                <h3 class="text-2xl font-bold bg-red-500 text-gray-900 dark:text-white p-2">{{ $title }}</h3>
                <div class="p-4">{{ $slot }}</div>
            </div>

        </div>
    </div>
</div>
