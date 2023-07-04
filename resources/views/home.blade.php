@extends('layouts.app')

@section('title')
    DevStagram
@endsection

@section('main')
    <x-list-posts :posts="$posts" />
@endsection
    