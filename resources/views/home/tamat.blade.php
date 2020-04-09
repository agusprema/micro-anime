@extends('layouts.home')
@section('title', 'Tamat | ')
@section('content')
<!-- post -->
@if ($tamats->items())
    <div class="title-widget mb-1"><i style="color: #00dcff;" class="far fa-check-circle pr-1"></i><span class="text-white">Anime Complete</span></div>

    @foreach ($tamats as $tamat)
    <div class="col-md-2-a p-1 box-post float-left">
        <a href="{{ url('/anime') . '/' . $tamat->id_anime }}" title="{{ $tamat->title_anime }}">
            @Settings('bassic_settings.lazy_load.status', 'true')
            <img data-src="{{ $tamat->image_anime }}" title="{{ $tamat->title_anime }}">
            @else
            <img src="{{ $tamat->image_anime }}" title="{{ $tamat->title_anime }}">
            @endSettings
            <div class="title-post">{{ $tamat->title_anime }}</div>
        </a>

        @if ($tamat->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

        <?php $episode = \DB::table('episode_animes')->where('id_anime', $tamat->id_anime)->count(); ?>
        <div class="label-episode-right text-white">Episode {{ $episode }}</div>

        <div class="label-box">
            {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($tamat->id_anime) !!}
            {!! App\Helpers\AnimeLabelHelper::instance()->label_new($tamat->id_anime) !!}
        </div>
    </div>
    @endforeach
@else
    @include('partials.errors_anime')
@endif
<div class="clearfix"></div>
{{ $tamats->links('vendor.pagination.pagination') }}
@endsection
