@extends('layouts.home')
@section('title', 'Genre '.ucwords(str_replace('-', ' ', $title_web)).' | ')
@section('content')
<!-- post -->
@if ($genres->items())
<div class="title-widget mb-1"><i style="color: #00dcff;" class="fas fa-history pr-1"></i><span class="text-white">Genre {{ str_replace('-', ' ',$name_genre) }}</span></div>

@foreach ($genres as $genre)
<div class="col-md-2-a p-1 box-post float-left">
    <a href="{{ url('/anime') . '/' . $genre->id_anime }}" title="{{ $genre->title_anime }}">
        @ControlPanel('lazy load')
        <img data-src="{{ $genre->image_anime }}" title="{{ $genre->title_anime }}">
        @else
        <img src="{{ $genre->image_anime }}" title="{{ $genre->title_anime }}">
        @endControlPanel
        <div class="title-post">{{ $genre->title_anime }}</div>
    </a>

    @if ($genre->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

    <?php $episode = \DB::table('episode_animes')->where('id_anime', $genre->id_anime)->count(); ?>
    <div class="label-episode-right text-white">Episode {{ $episode }}</div>

    <div class="label-box">
        {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($genre->id_anime) !!}
        {!! App\Helpers\AnimeLabelHelper::instance()->label_new($genre->id_anime) !!}
    </div>
</div>
@endforeach
@else
@include('partials.errors_anime')
@endif

<div class="clearfix"></div>
{{ $genres->links('vendor.pagination.pagination') }}
@endsection
