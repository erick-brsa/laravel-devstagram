@extends('layouts.app')

@section('title')
    Inicia Sesión
@endsection

@section('main')
    <div class="lg:flex lg:justify-center md:gap-10 md:items-center lg:rounded ">
        <div class="lg:w-2/3 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login usuarios" class="rounded-lg">
        </div>
        <div class="bg-white lg:w-1/3 p-6 rounded-lg shadow">
            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-5" novalidate>
                @csrf
                <div>
                    <label for="email" class="text-gray-500 block font-bold uppercase mb-2">
                        Correo electrónico
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        placeholder="Tu correo electrónico" 
                        class="border p-3 w-full rounded-lg @error('email') border-red-400 @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                    <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-gray-500 block font-bold uppercase mb-2">
                        Contraseña
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        placeholder="Contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-400 @enderror"
                    />
                    @error('password')
                    <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                    @enderror
                </div>
                @if(session('message'))
                    <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">
                        {{ session('message') }}
                    </p>
                @endif
                <div>
                    <input type="checkbox" name="remember" id="remember"> 
                    <label for="remember" class="text-gray-500 text-sm">
                        Mantener mi sesión abierta
                    </label>
                </div>
                <input 
                    type="submit" 
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 text-white transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3"
                />
            </form>
        </div>
    </div>
@endsection
