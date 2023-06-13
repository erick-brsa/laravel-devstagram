<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="grid grid-rows-[auto_1fr_auto] min-h-screen">
        <header class="bg-white shadow border-b p-5">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>
                <nav class="flex gap-2 items-center">
                    <a href="#" class="font-bold uppercase text-gray-600 text-sm">Ingresar</a>
                    <a href="#" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
                </nav>
            </div>
        </header>
        
        <main class="container mx-auto my-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')
            </h2>
            @yield('main')
        </main>

        <footer class="text-gray-500 text-center font-bold uppercase p-5">
            DevStagram - Todos los derechos reservados {{ now()->year }}
        </footer>
    </body>
</html>
