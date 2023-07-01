@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('main')
    <div class="flex">
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
        <div class="md:w-1/2">
            2
        </div>
    </div>
@endsection
