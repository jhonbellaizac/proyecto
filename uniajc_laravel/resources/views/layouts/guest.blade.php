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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
      <div class="min-h-screen flex flex-col items-center pt-4 bg-gray-100 dark:bg-gray-200">

    <div class="w-full sm:max-w-md p-0 bg-grey shadow-md rounded-lg">
    <a href="/" class="flex justify-center">
        <img src="{{ asset('images/MH.png') }}" class="w-[140px]">
    </a>
</div>

    <div class="w-full sm:max-w-md mt-3 px-6 py-4 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        {{ $slot }}
    </div>

</div>
    </body>
</html>