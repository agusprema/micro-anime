@extends('layouts.home')
@section('title', 'Ongoing | ')
@section('content')
<!-- post -->
@if ($ongoings->items())
    <div class="title-widget mb-1"><i style="color: #00dcff;" class="fas fa-history pr-1"></i><span class="text-white">Ongoing Anime</span></div>

    @foreach ($ongoings as $ongoing)
    <div class="col-md-2-a p-1 box-post float-left">
        <a href="{{ url('/anime') . '/' . $ongoing->id_anime }}" title="{{ $ongoing->title_anime }}">
            <img data-src="{{ $ongoing->image_anime }}" title="{{ $ongoing->title_anime }}">
            <div class="title-post">{{ $ongoing->title_anime }}</div>
        </a>

        @if ($ongoing->status_anime == 'Tamat')
        <div class="label-tamat text-white">Tamat</div>
        @else
        <div class="label-ongoing text-white">Ongoing</div>
        @endif

        <?php $episode = \DB::table('episode_animes')->where('id_anime', $ongoing->id_anime)->count(); ?>
        @if ($ongoing->label_hot !== 'Y')
        <div class="label-episode-left text-white">Episode {{ $episode }}</div>
        @elseif ($ongoing->label_new !== 'Y')
        <div class="label-episode-right text-white">Episode {{ $episode }}</div>
        @endif

        @if ($ongoing->label_hot == 'Y')
        <div class="label-hot">H</div>
        @endif
        @if ($ongoing->label_new == 'Y')
        <div class="label-new">N</div>
        @endif
    </div>
    @endforeach
@else
    @include('partials.errors_anime')
@endif
<div class="clearfix"></div>
{{ $ongoings->links() }}
@endsection
