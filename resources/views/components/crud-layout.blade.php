<x-app-layout>
    @php
        $entity_plural_form = Str::plural($entity);
    @endphp

    <h1 class="text-2xl font-bold mb-4">
        {{ Str::ucfirst($entity_plural_form) }}
    </h1>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">
                @if (Route::is('dashboard.' . $entity_plural_form . '.index'))
                    All {{ Str::ucfirst($entity_plural_form) }}
                @elseif (Route::is('dashboard.' . $entity_plural_form . '.show'))
                    Show {{ Str::ucfirst($entity) }}
                @elseif (Route::is('dashboard.' . $entity_plural_form . '.edit'))
                    Edit {{ Str::ucfirst($entity) }}
                @elseif (Route::is('dashboard.' . $entity_plural_form . '.create'))
                    Create {{ Str::ucfirst($entity) }}
                @endif
            </h2>
            {{-- back Button --}}
            @if (Route::is('dashboard.' . $entity_plural_form . '.index'))
                @unless ($entity === 'customer')
                    <x-button :href="route('dashboard.' . $entity_plural_form . '.create')">
                        Add {{ Str::ucfirst($entity) }}
                    </x-button>
                @endunless
            @else
                <x-button :href="route('dashboard.' . $entity_plural_form . '.index')">
                    Back
                </x-button>
            @endif
        </div>
        {{ $slot }}
    </div>
</x-app-layout>
