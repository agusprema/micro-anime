@extends('layouts.user')

@section('title', 'Sub Menu Management')
@section('inc_style')
<style>
    .label-box{position:absolute;bottom:27px;right:4px};
    .label-episode-left {
        background-color: #dc3545;
        top: 4px;
        left: 4px;
        font-size: 11px
    }

    .label-episode-right {
        background-color: #dc3545;
        top: 4px;
        right: 4px;
        font-size: 11px
    }

    .mbs-40 {
        margin-bottom: 20px
    }

    .label-episode-right,
    .label-episode-left,
    .label-ongoing,
    .label-tamat {
        position: absolute;
        padding: 2px 8px;
        font-size: 12px;
        color: #fff
    }

    .label-tamat {
        background-color: #000;
        border-top-right-radius: 5px;
        bottom: 28px;
        left: 4px
    }

    .label-ongoing {
        background-color: #006eff;
        border-top-right-radius: 5px;
        bottom: 28px;
        left: 4px
    }

    .box-post img {
        min-height: 225px;
        max-height: 225px;
        width: 100%
    }

    .col-md-2-a {
        -ms-flex: 0 0 10%;
        flex: 0 0 10%;
        max-width: 10%;
        position: relative;
        width: 100%
    }

    .title-post {
        max-width: 100%;
        text-align: center;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        text-transform: capitalize!important;
        color: #3a3b45!important
    }

    .label-hot,
    .label-new {
        font-size: 11px;
        font-weight: 700;
        padding: 0 4px;
        padding-top: 2px;
        border-radius: 3px;
        line-height: 15px;
        color: #fff
    }

    .btn-close {
        position: absolute;
        font-size: 11px;
        font-weight: 700;
        padding: 0 4px;
        padding-top: 2px;
        border-radius: 3px;
        line-height: 15px;
        color: #fff
    }

    .label-hot {
        top: 6px;
        left: 5px;
        background: #c82a39;
        border: 1px solid #fff
    }

    .label-new {
        top: 6px;
        right: 7px;
        background: #0088f8;
        border: 1px solid #fff
    }

    .btn-close {
        top: -16px;
        cursor: pointer;
        text-align: center;
        color: #fff;
        font-size: 12px;
        width: 95px;
        height: 18px;
        background-image: url(../img/close.png);
        background-repeat: no-repeat;
        margin: 0;
        position: absolute;
        left: 50%;
        transform: translate(-50%)
    }

    @media (max-width:500px) {
        .col-md-2-a {
            -ms-flex: 0 0 33.33333%!important;
            flex: 0 0 33.33333%!important;
            max-width: 33.33333%!important
        }
        .box-post img {
            min-height: 170px;
            max-height: 170px
        }
    }

    @media (max-width:360px) {
        .box-post img {
            min-height: 200px;
            max-height: 200px
        }
        .col-md-2-a {
            -ms-flex: 0 0 50%!important;
            flex: 0 0 50%!important;
            max-width: 50%!important
        }
    }

    @media (max-width:1280px) {
        .col-md-2-a {
            -ms-flex: 0 0 15%;
            flex: 0 0 15%;
            max-width: 15%
        }
    }

    @media (max-width:900px) {
        .col-md-2-a {
            -ms-flex: 0 0 33.3333%;
            flex: 0 0 33.3333%;
            max-width: 33.3333%
        }
    }

    .btn-close:hover {
        opacity: .8
    }

    .box-post a:hover {
        opacity: .8;
        text-decoration: none
    }

    .mbs-10 {
        margin-bottom: 15px
    }

    .flr {
        float: right
    }

    @media (max-width:900px) {
        .flr {
            float: left
        }
        .col-md-2-a {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }
    }

    @media (max-width:400px) {
        .label-episode-right,
        .label-episode-left {
            font-size: 10px !important;
        }
    }
</style>
@endsection
@section('content')
<div class="baba">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Sub Menu Management</h1>
    <form class="float-left" action="{{ url()->full() }}" method="get">
        <div class="input-group">
            <input type="text" class="form-control" name="s" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </div>
    </form>
    <div class="custom-control custom-switch flr">
        <input type="checkbox" class="custom-control-input" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">Turn on the switch to open the delete button</label>
    </div>
    <div class="clearfix"></div>
</div>

<div class="row">
    <div class="col-lg-8">
        @include('partials.alerts')
    </div>
</div>
@foreach ($bookmarks as $bookmark)
<div class="col-md-2-a p-1 remove box-post float-left {{ $bookmark->id_anime }}">
    <div class="btn-close d-none" id="btn-close" data-anim="{{ $bookmark->id_anime }}">Delete X</div>
    <a href="{{ url('anime', $bookmark->id_anime) }}" title="{{ $bookmark->title_anime }}">
        <img src="{{ $bookmark->image_anime }}" title="{{ $bookmark->title_anime }}">
        <div class="title-post">{{ $bookmark->title_anime }}</div>
    </a>

    @if ($bookmark->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

    <?php $episode = \DB::table('episode_animes')->where('id_anime', $bookmark->id_anime)->count(); ?>
    <div class="label-episode-right text-white">Episode {{ $episode }}</div>

    <div class="label-box">
        {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($bookmark->id_anime) !!}
        {!! App\Helpers\AnimeLabelHelper::instance()->label_new($bookmark->id_anime) !!}
    </div>
</div>
@endforeach
<div class="clearfix"></div>
{{ $bookmarks->links() }}
@endsection
