<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Settings</h1>
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Account Settings</h2>
        <form action="{{ route('dashboard.settings.update', $settings->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-error-alert/>
            <x-success-alert/>

            <x-input label="Username :" name="username" value="{{ $settings->username }}" />

            <x-input type="email" label="Email :" name="email" value="{{ $settings->email }}" />

            <x-input type="password" label="Password :" name="password" />

            <x-input label="Phone :" name="phone" value="" maxlength="15" size="15" append=" "
                value="{{ $settings->phone }}" />

            <x-textarea label="Address :" name="address">{{ $settings->address }}</x-textarea>

            <x-input label="Postal Code :" name="postal_code" value="{{ $settings->postal_code }}" maxlength="10"
                size="10" append=" " />

            <x-input type="file" label="Avatar :" name="avatar" />
            <div class="w-20 h-20 rounded-full overflow-hidden ml-4 mt-4 text-center text-4xl font-bold">
                <img src="{{ $settings->avatar }}" alt="{{ mb_substr(Auth::user()->name, 0, 1, 'UTF-8') }}"
                    class="w-full h-full object-cover" id="img" />
            </div>

            <h2 class="text-xl font-bold mb-4">Preferences :</h2>

            <x-item-select label="Theme" name="theme" :items="makeItems(['light', 'dark'])" selectedItemId="{{ $settings->theme }}" />

            <x-item-select label="Language" name="language" :items="makeItems(['English', 'Arabic'])"
                selectedItemId="{{ $settings->language }}" />

            <div class="flex justify-between">
                <x-button>Save Changes</x-button>
                <x-button type="reset">Reset</x-button>
            </div>
        </form>
    </div>

    
</x-app-layout>
