@extends('layouts.app')

@section('title')
    Regístrate
@endsection

@section('main')
    <div class="lg:flex lg:justify-center md:gap-10 md:items-center lg:rounded ">
        <div class="lg:w-2/3 p-5">
            <img src="{{ asset('./img/registrar.jpg') }}" alt="Imagen registro usuarios">
        </div>
        <div class="bg-white lg:w-1/3 p-6 rounded-lg shadow">
            <form class="flex flex-col gap-5">
                <div>
                    <label for="name" class="text-gray-500 block font-bold uppercase mb-2">
                        Nombre
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        placeholder="Tu nombre" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div>
                    <label for="username" class="text-gray-500 block font-bold uppercase mb-2">
                        Nombre de usuario
                    </label>
                    <input 
                        id="username" 
                        name="name" 
                        type="text" 
                        placeholder="Tu nombre de usuario" 
                        class="border p-3 w-full rounded-lg"
                    />
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
                        class="border p-3 w-full rounded-lg"
                    />
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
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div>
                    <label for="password_confirmation" class="text-gray-500 block font-bold uppercase mb-2">
                        Confirmar contraseña
                    </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password_confirmation" 
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

