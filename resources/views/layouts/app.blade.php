<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100 grid grid-rows-[auto_1fr_auto] min-h-screen">
        <header class="bg-white shadow border-b p-5">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/" class="text-3xl font-black">
                    DevStagram
                </a>

                @auth
                    <nav class="flex gap-5 items-center">
                        <a href="#" class="font-bold uppercase text-gray-600 text-sm">
                            Hola: <span class="font-normal lowercase">{{ auth()->user()->username }}</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesión</button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav class="flex gap-5 items-center">
                        <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm">Ingresar</a>
                        <a href="{{ route('signin') }}" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
                    </nav>
                @endguest
            </div>
        </header>
        
        <main class="container mx-auto my-10 px-2">
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
