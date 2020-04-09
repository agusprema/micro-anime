@extends('layouts.user')

@section('title', 'Edit Ads Banner Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Ads Banner Management</h1>

<a href="{{ route('moderator.ads-banner.index') }}" class="btn btn-primary mb-3">Back To Ads Banner</a>
<div class="row">
    <div class="col-lg">

        @include('partials.alerts')

        <form action="{{ url('/moderator/ads-banner', $ads->id) }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $ads->id }}">
            {{ method_field('PUT') }}

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title Ads</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $ads->title ?? old('title') }}">
                    @error('title')
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
                <label for="image" class="col-sm-2 col-form-label">Image Ads</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="image" name="image" value="{{ $ads->image ?? old('image') }}">
                    @error('image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="type_for" class="col-sm-2 col-form-label">Type Ads</label>
                <div class="col-sm-10">
                    <select name="type_for" id="type_for" class="custom-select">
                        <option value="">Select Type Ads</option>
                        <option value="home" @if (old('type_for') == 'home' OR $ads->type_for == 'home')selected @endif>Home</option>
                        <option value="anime" @if (old('type_for') == 'anime' OR $ads->type_for == 'anime')selected @endif>Anime</option>
                        <option value="footer" @if (old('type_for') == 'footer' OR $ads->type_for == 'footer')selected @endif>Footer</option>
                        <option value="announcements" @if (old('type_for') == 'announcements' OR $ads->type_for == 'announcements')selected @endif>Announcements</option>
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
