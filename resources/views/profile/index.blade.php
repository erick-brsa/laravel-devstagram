@extends('layouts.app')

@section('title')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('main')
    <div class="md:flex md:justify-center">
        <div class="bg-white shadow md:w-1/2 p-5">
            <form 
                action="{{ route('profile.store') }}" 
                method="POST"
                enctype="multipart/form-data"
                class="flex flex-col gap-5 mt-5"
            >
                @csrf
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
                        value="{{ auth()->user()->username }}"
                    />
                    @error('username')
                    <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="image" class="text-gray-500 block font-bold uppercase mb-2">
                        Imagen perfil
                    </label>
                    <input 
                        id="image" 
                        name="image" 
                        accept=".jpg,.jpeg,.png"
                        type="file" 
                        placeholder="Tu nombre de usuario" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <input 
                    type="submit" 
                    value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 text-white transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3"
                />
            </form>
        </div>
    </div>
@endsection

