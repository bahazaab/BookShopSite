<x-crud-layout entity='customer'>
    <form action="{{ route('dashboard.customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-error-alert/>

        <x-input name="name" label="Username" value="{{ $customer->name }}" />

        <x-input type="email" name="email" label="Email" value="{{ $customer->email }}" />

        <x-input id="avatar" label="Profile Image" type="file" name="avatar" />
        @if ($customer->settings->avatar)
            <div class="w-20 h-20 rounded-full overflow-hidden ml-4 mt-4">
                <img src="{{ $customer->settings->avatar }}" alt="{{ $customer->name }}"
                    class="w-full h-full object-cover" id="img"/>
            </div>
        @endif

        <x-input name="phone" maxlength="15" size="15" append=" " label="Phone"
            value="{{ $customer->settings->phone }}" />

        <x-textarea name="address" label="Address">
            {{ $customer->settings->address }}
        </x-textarea>

        <x-input name="postal_code" maxlength="10" size="10" append=" " label="Postal Code"
            value="{{ $customer->settings->postal_code }}" />

        <x-button type="submit">
            Update
        </x-button>

    </form>
</x-crud-layout>
