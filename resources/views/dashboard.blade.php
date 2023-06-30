@extends('layouts.app')

@section('title')
    {{$user->name}} - {{ $user->username }}
@endsection

@section('main')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-1/2 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Seguidos</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Publicaciones</span>
                </p>
            </div>
        </div>
    </div>

    <section class="continer mx-auto mt-10">
        <h2 class="text-3xl text-center font-black my-10">Publicaciones</h2>
        
        @if($posts->count())
            <div class="grid grid-cols-3 xl:grid-cols-4 gap-2 md:gap-5">
                @foreach($posts as $post)
                    <div>
                        <a href="#">
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-600 font-bold text-center text-sm uppercase">No hay publicaciones</p>
            
        @endif
    </section>

@endsection
