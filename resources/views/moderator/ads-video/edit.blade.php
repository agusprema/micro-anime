@extends('layouts.user')

@section('title', 'Edit Ads Video Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Ads Video Management</h1>

<a href="{{ route('moderator.ads-video.index') }}" class="btn btn-primary mb-3">Back To Ads Video</a>
<div class="row">
    <div class="col-lg">

        @include('partials.alerts')

        <form action="{{ url('/moderator/ads-video', $ads->id) }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $ads->id }}">
            {{ method_field('PUT') }}

            <div class="form-group row">
                <label for="message" class="col-sm-2 col-form-label">Message Ads</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="message" name="message" value="{{ $ads->message ?? old('message') }}">
                    @error('message')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label">Url Ads</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="{{ $ads->url ?? old('url') }}">
                    @error('url')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="video" class="col-sm-2 col-form-label">Video Ads</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="video" name="video" value="{{ $ads->video ?? old('video') }}">
                    @error('video')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="type_for" class="col-sm-2 col-form-label">Type Ads</label>
                <div class="col-sm-10">
                    <select name="type_for" id="type_for" class="custom-select">
                        <option value="">Select Type Ads</option>
                        <option value="preroll" @if (old('type_for') == 'preroll' OR $ads->type_for == 'preroll')selected @endif>Preroll</option>
                        <option value="postroll" @if (old('type_for') == 'postroll' OR $ads->type_for == 'postroll')selected @endif>Postroll</option>
                    </select>
                    @error('type_for')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="expired" class="col-sm-2 col-form-label">Date Expired Ads</label>
                <div class="col-sm-10">
                    <input type="date" name="expired" id="expired" max="{{ date('Y') }}-12-31" min="{{ date('Y') }}-01-01" class="form-control" value="{{ $ads->expired ?? old('expired') }}">

                    @error('expired')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
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
