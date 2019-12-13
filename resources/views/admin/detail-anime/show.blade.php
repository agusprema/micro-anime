@extends('layouts.user')

@section('title', 'Edit Detail Anime Management')

@section('content')
<style>
    .card-body .b-cs b{
        display: block;
        float: left;
        width: 110px;
    }
    .card-body .b-cs{
        margin-bottom: 0.5rem;
    }
    .card-img {
        height: 100%;
    }
</style>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ $detail->title_anime }}</h1>

<div class="row">
    <div class="col-lg">
        <a href="{{route('admin.detail-anime.index')}}" class="btn btn-primary mb-3 float-left mr-1">Go back to detail anime</a>
        <a href="{{route('admin.detail-anime.edit', $detail->id)}}" class="btn btn-success mb-3 float-left mr-1"><i class="far fa-edit mr-1"></i>Edit</a>
        <form action="{{ route('admin.detail-anime.destroy', $detail) }}" method="POST" class="float-left mb-3 mr-1" id="tmbl-delete-{{ $detail->id }}">
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger tmbl-delete tmbl-delete" value="{{ $detail->id }}"><i class="far fa-trash-alt mr-1"></i>Delete</button>
        </form>

        <div class="clearfix"></div>

        <div class="card mb-3 col-lg-8">
            <div class="row no-gutters">
                <div class="col-md-2 mt-4">
                    <img src="{{ $detail->image_anime }}" class="card-img" alt="{{ $detail->title_anime }}">
                </div>
                <div class="col-md-10">
                    <div class="card-body pb-0">
                        <p class="card-title b-cs"><b>Title Anime </b>: {{ $detail->title_anime }}</p>
                        <p class="card-title b-cs"><b>Alternativ </b>: {{ $detail->alternative_anime }}</p>
                        <p class="card-text b-cs"><b>Rating Anime </b>: {{ $detail->rating_anime }}</p>
                        <p class="card-text b-cs"><b>Vote Anime </b>: {{ $detail->vote_anime }}</p>
                        <p class="card-text b-cs"><b>Status Anime </b>: {{ $detail->status_anime }}</p>
                        <p class="card-text b-cs"><b>Type Anime </b>: {{ $detail->type_anime }}</p>
                        <p class="card-text b-cs"><b>Total Episode </b>: @if ($detail->total_anime){{$detail->total_anime}}@else{{__('Unknown')}}@endif</p>
                        <p class="card-text b-cs"><b>Jadwal Anime </b>: @if ($detail->jadwal_anime){{$detail->jadwal_anime}}@else{{__('none')}}@endif</p>
                        <p class="card-text b-cs"><b>Genre Anime </b>:
                            @foreach (explode(",", $detail->genre_anime) as $genre)
                            <a href="{{ url('archive/genre/') . '/' . strtolower(str_replace(",", "", $genre)) }}">{{ $genre }}</a>,
                            @endforeach
                        </p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-1"><b>Summary Anime</b></div>
                    <p class="card-text text-justify pb-3">{{ $detail->summary_anime }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
