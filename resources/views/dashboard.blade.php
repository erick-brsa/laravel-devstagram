@extends('layouts.app')

@section('title')
    Cuenta
@endsection

@section('main')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-1/2 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-700 text-2xl">{{ auth()->user()->username }}</p>
            </div>
        </div>
    </div>
@endsection