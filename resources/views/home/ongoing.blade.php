@extends('layouts.home')
@section('title', 'Ongoing | ')
@section('content')
<!-- post -->
@if ($ongoings->items())
    <div class="title-widget mb-1"><i style="color: #00dcff;" class="fas fa-history pr-1"></i><span class="text-white">Ongoing Anime</span></div>

    @foreach ($ongoings as $ongoing)
    <div class="col-md-2-a p-1 box-post float-left">
        <a href="{{ url('/anime') . '/' . $ongoing->id_anime }}" title="{{ $ongoing->title_anime }}">
            @ControlPanel('lazy load')
            <img data-src="{{ $ongoing->image_anime }}" title="{{ $ongoing->title_anime }}">
            @else
            <img src="{{ $ongoing->image_anime }}" title="{{ $ongoing->title_anime }}">
            @endControlPanel
            <div class="title-post">{{ $ongoing->title_anime }}</div>
        </a>

        @if ($ongoing->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

        <?php $episode = \DB::table('episode_animes')->where('id_anime', $ongoing->id_anime)->count(); ?>
        <div class="label-episode-right text-white">Episode {{ $episode }}</div>

        <div class="label-box">
            {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($ongoing->id_anime) !!}
            {!! App\Helpers\AnimeLabelHelper::instance()->label_new($ongoing->id_anime) !!}
        </div>
    </div>
    @endforeach
@else
    @include('partials.errors_anime')
@endif
<div class="clearfix"></div>
{{ $ongoings->links('vendor.pagination.pagination') }}
@endsection
