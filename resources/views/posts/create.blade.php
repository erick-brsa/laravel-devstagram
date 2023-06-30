@extends('layouts.app')

@section('title')
    Crear publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('main')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('image.store') }}" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white py-8 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data"  class="flex flex-col gap-5" novalidate>
                @csrf
                <div>
                    <label for="title" class="text-gray-500 block font-bold uppercase mb-2">
                        Título
                    </label>
                    <input 
                        id="title" 
                        name="title" 
                        type="text" 
                        placeholder="Titulo de la publicación" 
                        class="border p-3 w-full rounded-lg @error('title') border-red-400 @enderror"
                        value="{{ old('title') }}"
                    />
                    @error('title')
                    <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description" class="text-gray-500 block font-bold uppercase mb-2">
                        Descripción
                    </label>
                    <textarea 
                        id="description" 
                        name="description"
                        placeholder="Descripcion de la publicación" 
                        class="border p-3 w-full rounded-lg @error('description') border-red-400 @enderror"
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <input 
                        type="hidden"
                        name="image"
                        value="{{ old('image') }}"
                    />
                    @error('image')
                        <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                    @enderror    
                </div>

                <input 
                    type="submit" 
                    value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 text-white transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3"
                />
            </form>
        </div>
    </div>
@endsection
