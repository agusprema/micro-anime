@extends('layouts.home')
@section('title', 'Genre '.ucwords(str_replace('-', ' ', $title_web)).' | ')
@section('content')
<!-- post -->
@if ($genres->items())
<div class="title-widget mb-1"><i style="color: #00dcff;" class="fas fa-history pr-1"></i><span class="text-white">Genre Action</span></div>

@foreach ($genres as $genre)
<div class="col-md-2-a p-1 box-post float-left">
    <a href="{{ url('/anime') . '/' . $genre->id_anime }}" title="{{ $genre->title_anime }}">
        <img data-src="{{ $genre->image_anime }}" title="{{ $genre->title_anime }}">
        <div class="title-post">{{ $genre->title_anime }}</div>
    </a>

    @if ($genre->status_anime == 'Tamat')
    <div class="label-tamat text-white">Tamat</div>
    @else
    <div class="label-ongoing text-white">Ongoing</div>
    @endif

    <?php $episode = \DB::table('episode_animes')->where('id_anime', $genre->id_anime)->count(); ?>
    @if ($genre->label_hot !== 'Y')
    <div class="label-episode-left text-white">Episode {{ $episode }}</div>
    @elseif ($genre->label_new !== 'Y')
    <div class="label-episode-right text-white">Episode {{ $episode }}</div>
    @endif

    @if ($genre->label_hot == 'Y')
    <div class="label-hot">H</div>
    @endif
    @if ($genre->label_new == 'Y')
    <div class="label-new">N</div>
    @endif
</div>
@endforeach
@else
@include('partials.errors_anime')
@endif

<div class="clearfix"></div>
{{ $genres->links() }}
@endsection
