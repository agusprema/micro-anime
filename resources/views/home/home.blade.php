@extends('layouts.home')

@section('content')
<!-- post -->
@if ($animes->items())
    <div class="title-widget mb-1"><i style="color: #00dcff;" class="fas fa-history pr-1"></i><span class="text-white">Update Anime</span></div>

    @foreach ($animes as $anime)
    <div class="col-md-2-a p-1 box-post float-left">
        <a href="{{ url('/anime') . '/' . $anime->id_anime }}" title="{{ $anime->title_anime }}">
            @ControlPanel('lazy load')
            <img data-src="{{ $anime->image_anime }}" title="{{ $anime->title_anime }}">
            @else
            <img src="{{ $anime->image_anime }}" title="{{ $anime->title_anime }}">
            @endControlPanel
            <div class="title-post">{{ $anime->title_anime }}</div>
        </a>

        @if ($anime->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

        <?php $episode = \DB::table('episode_animes')->where('id_anime', $anime->id_anime)->count(); ?>
        <div class="label-episode-right text-white">Episode {{ $episode }}</div>

        <div class="label-box">
            {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($anime->id_anime) !!}
            {!! App\Helpers\AnimeLabelHelper::instance()->label_new($anime->id_anime) !!}
        </div>
    </div>
    @endforeach
@else
    @include('partials.errors_anime')
@endif
<div class="clearfix"></div>
{{ $animes->links('vendor.pagination.pagination') }}
@endsection
