@extends('layouts.app')

@section('title')
    {{$user->name}} - {{ $user->username }}
@endsection

@section('main')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-1/2 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->image ? asset('profiles') . '/' . $user->image : asset('img/usuario.svg') }}" alt="Imagen usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                    @auth
                        @if($user->id === auth()->user()->id)
                            <a href="{{ route('profile.index', $user) }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                </svg>                      
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->followers->count() }}
                    <span class="font-normal">
                        @choice('seguidor|seguidores', $user->followers->count())
                    </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->following->count() }}
                    <span class="font-normal">
                        @choice('seguido|seguidos', $user->following->count())
                    </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $posts->count() }}
                    <span class="font-normal">Publicaciones</span>
                </p>
                @auth
                    @if($user->id !== auth()->user()->id)
                        @if(!$user->isFollowing(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input 
                                    type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 transition-colors text-white uppercase rounded-lg px-3 py-1 font-bold cursor-pointer"
                                    value="Seguir"
                                />
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input 
                                    type="submit"
                                    class="bg-red-500 hover:bg-red-600 transition-colors text-white uppercase rounded-lg px-3 py-1 font-bold cursor-pointer"
                                    value="Dejar de seguir"
                                />
                            </form>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <section class="continer mx-auto mt-10">
        <h2 class="text-3xl text-center font-black my-10">Publicaciones</h2>
        
        @if($posts->count())
            <div class="grid grid-cols-3 xl:grid-cols-4 gap-2 md:gap-5">
                @foreach($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
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
