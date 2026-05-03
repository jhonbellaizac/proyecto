<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> MH Distribuidor | Inicio</title>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-900 font-sans">
<nav class="bg-white shadow-sm py-4">
<div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
<div class="text-2xl font-bold text-black-800 tracking-tight">
                MH<span class="text-red-600">DISTRIBUIDOR</span>
</div>
<div class="space-x-4">
                @if (Route::has('login'))
                    @auth
<a href="{{ url('/menu') }}" class="text-gray-600 hover:text-orange-600 font-medium">Menú</a>
                    @else
<a href="{{ route('login') }}" class="text-gray-600 hover:text-orange-600 font-medium">Iniciar Sesión</a>
                        @if (Route::has('register'))
<a href="{{ route('register') }}" class="bg-red-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Regístrate</a>
                        @endif
                    @endauth
                @endif
</div>
</div>
</nav>
 
    <main class="max-w-7xl mx-auto px-4 py-20 flex flex-col lg:flex-row items-center gap-12">
<div class="lg:w-1/2 space-y-6 text-center lg:text-left">
<h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                Control inventaio<span class="text-black-600">MH</span>.
</h1>

<div class="pt-4">
<a href="{{ route('register') }}" class="inline-block bg-gray-900 text-white text-lg px-8 py-4 rounded-xl font-bold hover:bg-black shadow-lg transition-all transform hover:-translate-y-1">
                    Empezar ahora
</a>
</div>
</div>
 
        <div class="lg:w-1/2 w-full">
<div class="rounded-3xl overflow-hidden border-1 border-orange-300 aspect-video">
    <img src="{{ asset('images/MH.png') }}" alt="MH" class="w-full h-full object-cover">
</div>
</div>
</main>
 
    <footer class="border-t border-gray-200 py-10 mt-12 bg-white">
<div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
&copy; {{ date('Y') }} MH Distribuidor R&D. Todos los derechos reservados.
</div>
</footer>
 
</body>
</html>

