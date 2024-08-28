<!-- Sidebar -->
<div class="bg-white border-r border-gray-200 px-6 py-4 flex flex-col">

    <nav class="flex-1 space-y-1">
        <x-sidebar-btn href="{{  route('dashboard.') }}" icon="fa-solid fa-home" title="Home" :active="Route::is('dashboard.')"/>

        <x-sidebar-btn href="{{ route('dashboard.customers.index') }}" icon="fa-solid fa-user-group" title="Customers" :active="Route::is('dashboard.customers*')"/>

        <x-sidebar-btn href="{{ route('dashboard.books.index') }}" icon="fa-solid fa-book" title="Books" :active="Route::is('dashboard.books*')"/>

        <x-sidebar-btn href="{{ route('dashboard.categories.index') }}" icon="fa-solid fa-list" title="Categories" :active="Route::is('dashboard.categories*')"/>

        <x-sidebar-btn href="{{ route('dashboard.orders.index') }}" icon="fa-solid fa-shopping-cart" title="Orders" :active="Route::is('dashboard.orders*')"/>

        <x-sidebar-btn href="{{ route('dashboard.reports.index') }}" icon="fa-solid fa-chart-line" title="Reports" :active="Route::is('dashboard.reports*')"/>

        <x-sidebar-btn href="{{ route('dashboard.settings.index') }}" icon="fa-solid fa-gear" title="Settings" :active="Route::is('dashboard.settings*')"/>
    </nav>
</div>
