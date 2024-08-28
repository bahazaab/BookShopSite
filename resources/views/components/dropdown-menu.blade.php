<div x-data="{ open: false }">
    <button type="button" @click="open = !open"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ Auth::user()->name }}
        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <div x-show="open"
        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <!-- Dropdown menu items -->

        <a href="{{ route('public.') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
            tabindex="-1" id="user-menu-item-0">Public</a>

        <a href="{{ route('dashboard.settings.index') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
            tabindex="-1" id="user-menu-item-1">Settings</a>
        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
            role="menuitem" tabindex="-1" id="user-menu-item-2"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>