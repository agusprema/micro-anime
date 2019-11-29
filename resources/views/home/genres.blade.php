@extends('layouts.home')
@section('title', 'Genre Anime | ')
@section('content')
<!-- post -->
<div class="title-widget mb-3"><i style="color: #00dcff;" class="fas fa-history pr-1"></i><span class="text-white">List Genre</span></div>

<div class="content-genre-list text-center">
    @foreach ($genres as $genre)
    <a class="btn btn-light p-1 mb-2" href="{{ url('/archive/genre') . '/' . strtolower($genre->genre) }}" title="{{ str_replace("-", " ", $genre->genre) }}">{{ str_replace("-", " ", $genre->genre) }}</a>
    @endforeach
</div>

<div class="clearfix"></div>
@endsection
