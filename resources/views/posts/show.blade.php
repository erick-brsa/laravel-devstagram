@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('main')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}">
            <div class="p-4">
                <p>0 Likes</p>
            </div>
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="bg-white shadow mb-5 p-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                    @if(session('message'))
                        <div class="bg-green-500 text-white text-center p-2 rounded-lg mb-6 uppercase font-bold">{{ session('message') }}</div>
                    @endif

                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST" class="flex flex-col gap-5" novalidate>
                        @csrf
                        <div>
                            <label for="comment" class="text-gray-500 block font-bold uppercase mb-2">
                                Comentario
                            </label>
                            <textarea 
                                id="comment" 
                                name="comment"
                                placeholder="Escribe tu comentario" 
                                class="border p-3 w-full rounded-lg @error('comment') border-red-400 @enderror"
                            ></textarea>
                            @error('comment')
                            <p class="bg-red-100 text-red-700 border border-red-400 font-semibold rounded-lg my-2 text-sm py-2 px-4">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <input 
                            type="submit" 
                            value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 text-white transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3"
                        />
                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comments->count())
                       @foreach ($post->comments as $comment)
                        <div class="p-5 border-gray-300 border-b">
                            <a href="{{ route('posts.index', $comment->user->username) }}" class="font-bold">{{ $post->user->username }}</a>
                            <p>{{ $comment->comment }}</p>
                            <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                       @endforeach
                    @else
                        <p>No hay comentarios aún</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
