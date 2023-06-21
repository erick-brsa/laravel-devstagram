@extends('layouts.app')

@section('title')
    Regístrate
@endsection

@section('main')
    <div class="lg:flex lg:justify-center md:gap-10 md:items-center lg:rounded ">
        <div class="lg:w-2/3 p-5">
            <img src="{{ asset('./img/registrar.jpg') }}" alt="Imagen registro usuarios" class="rounded-lg">
        </div>
        <div class="bg-white lg:w-1/3 p-6 rounded-lg shadow">
            <form action="{{ route('signin') }}" method="POST" class="flex flex-col gap-5" novalidate>
                @csrf
                <div>
                    <label for="name" class="text-gray-500 block font-bold uppercase mb-2">
                        Nombre
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        placeholder="Tu nombre" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-400 @enderror"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                    <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="username" class="text-gray-500 block font-bold uppercase mb-2">
                        Nombre de usuario
                    </label>
                    <input 
                        id="username" 
                        name="username" 
                        type="text" 
                        placeholder="Tu nombre de usuario" 
                        class="border p-3 w-full rounded-lg @error('username') border-red-400 @enderror"
                        value="{{ old('username') }}"
                    />
                    @error('username')
                    <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                    @enderror
                </div>
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
                <div>
                    <label for="password_confirmation" class="text-gray-500 block font-bold uppercase mb-2">
                        Confirmar contraseña
                    </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        placeholder="Confirmar contraseña"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <input 
                    type="submit" 
                    value="Crear cuenta"
                    class="bg-sky-600 hover:bg-sky-700 text-white transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3"
                />
            </form>
        </div>
    </div>
@endsection

