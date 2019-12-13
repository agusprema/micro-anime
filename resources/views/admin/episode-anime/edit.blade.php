@extends('layouts.user')

@section('title', 'Edit Episode Anime Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Episode Anime Management</h1>

<div class="row">
    <div class="col-lg">

        <form action="{{ url('/admin/episode-anime', $episode->episode) }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $episode->id }}" readonly>
            <input type="hidden" class="form-control" id="id_anime" name="id_anime" value="{{ $episode->id_anime }}" readonly>
            {{ method_field('PUT') }}

            <div class="form-group row">
                <label for="episode" class="col-sm-2 col-form-label">Episode</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="episode" name="episode" value="{{ str_replace($episode->id_anime.'-Episode-', '', $episode->episode) ?? old('episode') }}">
                    @error('episode')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="video" class="col-sm-2 col-form-label">Video</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="video" name="video" value="{{ $episode->video ?? old('video') }}">
                    @error('video')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="download" class="col-sm-2 col-form-label">Download</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="download" name="download" value="{{ $episode->download ?? old('download') }}">
                    @error('download')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="next" class="col-sm-2 col-form-label">Next</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="next" name="next" value="{{ str_replace($episode->id_anime.'-Episode-', '', $episode->next) ?? old('next') }}">
                    @error('next')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="prev" class="col-sm-2 col-form-label">Prev</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prev" name="prev" value="{{ str_replace($episode->id_anime.'-Episode-', '', $episode->prev) ?? old('prev') }}">
                    @error('prev')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="type_anime" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Y" id="from_micro" name="from_micro" @if ($episode->from_micro == 'Y'){{ __('checked') }}@endif>
                        <label class="form-check-label" for="from_micro">
                            From Micro Cloud?
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="btn" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button id="btn" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
