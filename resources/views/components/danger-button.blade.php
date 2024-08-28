@props(['id' => '', 'entity' => ''])

<span x-data="{ show: false, buttonDisabled: false }" x-on:submit="buttonDisabled = true" @keydown.escape.window="show = false">

    <button x-on:click="show = true" x-bind:disabled="buttonDisabled"
        {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4 mt-4']) }}
        {{-- onclick="
        event.preventDefault();
        if(confirm('Are you sure you want to delete this item?')) 
        { 
            document.getElementById('delete-form-{{ $id }}')
            .submit(); 
        }
    " --}}>
        {{ $slot }}
    </button>

    <x-delete-modal title="Delete {{ $entity . ' #' . $id }}">
        <form id="delete-form-{{ $id }}"
            action="{{ route('dashboard.' . Str::plural($entity) . '.destroy', $id) }}" method="POST">
            @csrf
            @method('DELETE')

            <p class="text-xl p-4">Are you sure you want to delete this item?</p>
            <x-button class="me-3" color="bg-red-500">Delete</x-button>
            <x-button type="button" @click="show=false">cancel</x-button>

        </form>

    </x-delete-modal>

</span>
