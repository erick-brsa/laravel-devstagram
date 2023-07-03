@extends('layouts.app')

@section('title')
    DevStagram
@endsection

@section('main')
    @if($posts->count())
        <div class="grid grid-cols-3 xl:grid-cols-4 gap-2 md:gap-5">
            @foreach($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-center">No hay publicaciones para mostrar</p>
    @endif
@endsection