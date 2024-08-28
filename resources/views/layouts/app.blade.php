<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/f82969cfa7.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->


</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="flex justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <span class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </span>
                <x-search />

                <x-dropdown-menu/>

            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="min-h-screen flex">
                <x-sidebar />

                <!-- Main Content -->
                <div class="flex-1 p-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <script>
        const avatarInput = document.getElementById('avatar');
        const imgPreview = document.getElementById('img');

        if (avatarInput != null)
            avatarInput.addEventListener('change', (e) => {
                const reader = new FileReader();

                reader.onload = (e) => {
                    imgPreview.src = e.target.result;
                };

                reader.readAsDataURL(e.target.files[0]);

            });
    </script>

</body>

</html>
