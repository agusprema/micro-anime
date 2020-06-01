@extends('layouts.home')
@section('title', 'Jadwal Anime | ')
@section('content')
<!-- post -->
    <div class="title-widget mb-2"><i style="color: #00dcff;" class="far fa-calendar-check pr-1"></i><span class="text-white">Jadwal Anime</span></div>

    <div class="box-calendar mb-3 text-white border">
        <div class="title-widget-calendar text-center text-dark"><span>Senin</span></div>

        <div class="content-calendar">

            @foreach ($senins as $senin)
            <div class="col-md-2-a p-1 float-left">
                <a href="{{ route('anime.details', ['anime' => $senin->id_anime]) }}" title="{{ $senin->title_anime }}">
                    @Settings('bassic_settings.lazy_load.status', 'true')
                    <img data-src="{{ $senin->image_anime }}" title="{{ $senin->title_anime }}">
                    @else
                    <img src="{{ $senin->image_anime }}" title="{{ $senin->title_anime }}">
                    @endSettings
                    <div class="title-calendar">{{ $senin->title_anime }}</div>
                </a>
                @if ($senin->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                <?php $episode = \DB::table('episode_animes')->where('id_anime', $senin->id_anime)->count(); ?>
                <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                <div class="label-box">
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($senin->id_anime) !!}
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_new($senin->id_anime) !!}
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>



    <div class="box-calendar mb-3 text-white border">
        <div class="title-widget-calendar text-center text-dark"><span>Selasa</span></div>

        <div class="content-calendar">

            @foreach ($selasas as $selasa)
            <div class="col-md-2-a p-1 float-left">
                <a href="{{ route('anime.details', ['anime' => $selasa->id_anime]) }}" title="{{ $selasa->title_anime }}">
                    @Settings('bassic_settings.lazy_load.status', 'true')
                    <img data-src="{{ $selasa->image_anime }}" title="{{ $selasa->title_anime }}">
                    @else
                    <img src="{{ $selasa->image_anime }}" title="{{ $selasa->title_anime }}">
                    @endSettings
                    <div class="title-calendar">{{ $selasa->title_anime }}</div>
                </a>
                @if ($selasa->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                <?php $episode = \DB::table('episode_animes')->where('id_anime', $selasa->id_anime)->count(); ?>
                <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                <div class="label-box">
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($selasa->id_anime) !!}
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_new($selasa->id_anime) !!}
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>



    <div class="box-calendar mb-3 text-white border">
        <div class="title-widget-calendar text-center text-dark"><span>Rabu</span></div>

        <div class="content-calendar">

            @foreach ($rabus as $rabu)
            <div class="col-md-2-a p-1 float-left">
                <a href="{{ route('anime.details', ['anime' => $rabu->id_anime]) }}" title="{{ $rabu->title_anime }}">
                    @Settings('bassic_settings.lazy_load.status', 'true')
                    <img data-src="{{ $rabu->image_anime }}" title="{{ $rabu->title_anime }}">
                    @else
                    <img src="{{ $rabu->image_anime }}" title="{{ $rabu->title_anime }}">
                    @endSettings
                    <div class="title-calendar">{{ $rabu->title_anime }}</div>
                </a>
                @if ($rabu->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                <?php $episode = \DB::table('episode_animes')->where('id_anime', $rabu->id_anime)->count(); ?>
                <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                <div class="label-box">
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($rabu->id_anime) !!}
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_new($rabu->id_anime) !!}
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>



    <div class="box-calendar mb-3 text-white border">
        <div class="title-widget-calendar text-center text-dark"><span>Kamis</span></div>

        <div class="content-calendar">

            @foreach ($kamiss as $kamis)
            <div class="col-md-2-a p-1 float-left">
                <a href="{{ route('anime.details', ['anime' => $kamis->id_anime]) }}" title="{{ $kamis->title_anime }}">
                    @Settings('bassic_settings.lazy_load.status', 'true')
                    <img data-src="{{ $kamis->image_anime }}" title="{{ $kamis->title_anime }}">
                    @else
                    <img src="{{ $kamis->image_anime }}" title="{{ $kamis->title_anime }}">
                    @endSettings
                    <div class="title-calendar">{{ $kamis->title_anime }}</div>
                </a>
                @if ($kamis->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                <?php $episode = \DB::table('episode_animes')->where('id_anime', $kamis->id_anime)->count(); ?>
                <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                <div class="label-box">
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($kamis->id_anime) !!}
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_new($kamis->id_anime) !!}
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>



    <div class="box-calendar mb-3 text-white border">
        <div class="title-widget-calendar text-center text-dark"><span>Jumat</span></div>

        <div class="content-calendar">

            @foreach ($jumats as $jumat)
            <div class="col-md-2-a p-1 float-left">
                <a href="{{ route('anime.details', ['anime' => $jumat->id_anime]) }}" title="{{ $jumat->title_anime }}">
                    @Settings('bassic_settings.lazy_load.status', 'true')
                    <img data-src="{{ $jumat->image_anime }}" title="{{ $jumat->title_anime }}">
                    @else
                    <img src="{{ $jumat->image_anime }}" title="{{ $jumat->title_anime }}">
                    @endSettings
                    <div class="title-calendar">{{ $jumat->title_anime }}</div>
                </a>
                @if ($jumat->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                <?php $episode = \DB::table('episode_animes')->where('id_anime', $jumat->id_anime)->count(); ?>
                <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                <div class="label-box">
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($jumat->id_anime) !!}
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_new($jumat->id_anime) !!}
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>



    <div class="box-calendar mb-3 text-white border">
        <div class="title-widget-calendar text-center text-dark"><span>Sabtu</span></div>

        <div class="content-calendar">

            @foreach ($sabtus as $sabtu)
            <div class="col-md-2-a p-1 float-left">
                <a href="{{ route('anime.details', ['anime' => $sabtu->id_anime]) }}" title="{{ $sabtu->title_anime }}">
                    @Settings('bassic_settings.lazy_load.status', 'true')
                    <img data-src="{{ $sabtu->image_anime }}" title="{{ $sabtu->title_anime }}">
                    @else
                    <img src="{{ $sabtu->image_anime }}" title="{{ $sabtu->title_anime }}">
                    @endSettings
                    <div class="title-calendar">{{ $sabtu->title_anime }}</div>
                </a>
                @if ($sabtu->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                <?php $episode = \DB::table('episode_animes')->where('id_anime', $sabtu->id_anime)->count(); ?>
                <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                <div class="label-box">
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($sabtu->id_anime) !!}
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_new($sabtu->id_anime) !!}
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>



    <div class="box-calendar mb-3 text-white border">
        <div class="title-widget-calendar text-center text-dark"><span>Minggu</span></div>

        <div class="content-calendar">

            @foreach ($minggus as $minggu)
            <div class="col-md-2-a p-1 float-left">
                <a href="{{ route('anime.details', ['anime' => $minggu->id_anime]) }}" title="{{ $minggu->title_anime }}">
                    @Settings('bassic_settings.lazy_load.status', 'true')
                    <img data-src="{{ $minggu->image_anime }}" title="{{ $minggu->title_anime }}">
                    @else
                    <img src="{{ $minggu->image_anime }}" title="{{ $minggu->title_anime }}">
                    @endSettings
                    <div class="title-calendar">{{ $minggu->title_anime }}</div>
                </a>
                @if ($minggu->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                <?php $episode = \DB::table('episode_animes')->where('id_anime', $minggu->id_anime)->count(); ?>
                <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                <div class="label-box">
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($minggu->id_anime) !!}
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_new($minggu->id_anime) !!}
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>



    <div class="box-calendar mb-3 text-white border">
        <div class="title-widget-calendar text-center text-dark"><span>Random</span></div>

        <div class="content-calendar">

            @foreach ($randoms as $random)
            <div class="col-md-2-a p-1 float-left">
                <a href="{{ route('anime.details', ['anime' => $random->id_anime]) }}" title="{{ $random->title_anime }}">
                    @Settings('bassic_settings.lazy_load.status', 'true')
                    <img data-src="{{ $random->image_anime }}" title="{{ $random->title_anime }}">
                    @else
                    <img src="{{ $random->image_anime }}" title="{{ $random->title_anime }}">
                    @endSettings
                    <div class="title-calendar">{{ $random->title_anime }}</div>
                </a>
                @if ($random->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                <?php $episode = \DB::table('episode_animes')->where('id_anime', $random->id_anime)->count(); ?>
                <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                <div class="label-box">
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($random->id_anime) !!}
                    {!! App\Helpers\AnimeLabelHelper::instance()->label_new($random->id_anime) !!}
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
<div class="clearfix"></div>
@endsection
