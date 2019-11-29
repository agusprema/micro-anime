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
                <a href="{{ url('/anime') . '/' . $senin->id_anime }}" title="{{ $senin->title_anime }}">
                    <img data-src="{{ $senin->image_anime }}" alt="{{ $senin->title_anime }}">
                    <div class="title-calendar">{{ $senin->title_anime }}</div>
                </a>
                <div class="label-ongoing text-white">Ongoing</div>
                @if ($senin->label_hot == 'Y')<div class="label-hot">H</div>@endif
                @if ($senin->label_new == 'Y')<div class="label-new">N</div>@endif
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
                <a href="{{ url('/anime') . '/' . $selasa->id_anime }}" title="{{ $selasa->title_anime }}">
                    <img data-src="{{ $selasa->image_anime }}" alt="{{ $selasa->title_anime }}">
                    <div class="title-calendar">{{ $selasa->title_anime }}</div>
                </a>
                <div class="label-ongoing text-white">Ongoing</div>
                @if ($selasa->label_hot == 'Y')<div class="label-hot">H</div>@endif
                @if ($selasa->label_new == 'Y')<div class="label-new">N</div>@endif
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
                <a href="{{ url('/anime') . '/' . $rabu->id_anime }}" title="{{ $rabu->title_anime }}">
                    <img data-src="{{ $rabu->image_anime }}" alt="{{ $rabu->title_anime }}">
                    <div class="title-calendar">{{ $rabu->title_anime }}</div>
                </a>
                <div class="label-ongoing text-white">Ongoing</div>
                @if ($rabu->label_hot == 'Y')<div class="label-hot">H</div>@endif
                @if ($rabu->label_new == 'Y')<div class="label-new">N</div>@endif
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
                <a href="{{ url('/anime') . '/' . $kamis->id_anime }}" title="{{ $kamis->title_anime }}">
                    <img data-src="{{ $kamis->image_anime }}" alt="{{ $kamis->title_anime }}">
                    <div class="title-calendar">{{ $kamis->title_anime }}</div>
                </a>
                <div class="label-ongoing text-white">Ongoing</div>
                @if ($kamis->label_hot == 'Y')<div class="label-hot">H</div>@endif
                @if ($kamis->label_new == 'Y')<div class="label-new">N</div>@endif
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
                <a href="{{ url('/anime') . '/' . $jumat->id_anime }}" title="{{ $jumat->title_anime }}">
                    <img data-src="{{ $jumat->image_anime }}" alt="{{ $jumat->title_anime }}">
                    <div class="title-calendar">{{ $jumat->title_anime }}</div>
                </a>
                <div class="label-ongoing text-white">Ongoing</div>
                @if ($jumat->label_hot == 'Y')<div class="label-hot">H</div>@endif
                @if ($jumat->label_new == 'Y')<div class="label-new">N</div>@endif
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
                <a href="{{ url('/anime') . '/' . $sabtu->id_anime }}" title="{{ $sabtu->title_anime }}">
                    <img data-src="{{ $sabtu->image_anime }}" alt="{{ $sabtu->title_anime }}">
                    <div class="title-calendar">{{ $sabtu->title_anime }}</div>
                </a>
                <div class="label-ongoing text-white">Ongoing</div>
                @if ($sabtu->label_hot == 'Y')<div class="label-hot">H</div>@endif
                @if ($sabtu->label_new == 'Y')<div class="label-new">N</div>@endif
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
                <a href="{{ url('/anime') . '/' . $minggu->id_anime }}" title="{{ $minggu->title_anime }}">
                    <img data-src="{{ $minggu->image_anime }}" alt="{{ $minggu->title_anime }}">
                    <div class="title-calendar">{{ $minggu->title_anime }}</div>
                </a>
                <div class="label-ongoing text-white">Ongoing</div>
                @if ($minggu->label_hot == 'Y')<div class="label-hot">H</div>@endif
                @if ($minggu->label_new == 'Y')<div class="label-new">N</div>@endif
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
                <a href="{{ url('/anime') . '/' . $random->id_anime }}" title="{{ $random->title_anime }}">
                    <img data-src="{{ $random->image_anime }}" alt="{{ $random->title_anime }}">
                    <div class="title-calendar">{{ $random->title_anime }}</div>
                </a>
                <div class="label-ongoing text-white">Ongoing</div>
                @if ($random->label_hot == 'Y')<div class="label-hot">H</div>@endif
                @if ($random->label_new == 'Y')<div class="label-new">N</div>@endif
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
<div class="clearfix"></div>
@endsection
