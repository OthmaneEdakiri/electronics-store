<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('partials.header')

        <!-- Page Content -->
        <main>
            <div class="container pt-[60px] pb-[140px]">
                <div class="min-h-screen bg-white flex">
                    <!-- Left Side - Image -->
                    <div class="hidden lg:block lg:w-1/2 relative">
                        <img src="{{ asset('assets/img/auth-side-image.png') }}" alt="Login"
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    <!-- Right Side - Login Form -->
                    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>

        @include('partials.footer')

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        @stack('scripts')

    </div>
</body>

</html>
