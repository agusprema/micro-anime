@extends('layouts.user')

@section('title', 'Edit Detail Anime Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Detail Anime Management</h1>

<a href="{{ route('admin.detail-anime.index') }}" class="btn btn-primary mb-3">Back To Detail Anime</a>
<div class="row">
    <div class="col-lg">

        <form action="{{ url('/admin/detail-anime', $detail->id) }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $detail->id }}">
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="id_anime" class="col-sm-2 col-form-label">Id Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_anime" name="id_anime" value="{{ $detail->id_anime ?? old('id_anime') }}">
                    @error('id_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="title_anime" class="col-sm-2 col-form-label">Title Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title_anime" name="title_anime" value="{{ $detail->title_anime ?? old('title_anime') }}">
                    @error('title_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="alternative_title" class="col-sm-2 col-form-label">Alternative Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alternative_title" name="alternative_title" value="{{ $detail->alternative_title ?? old('alternative_title') }}">
                    @error('alternative_title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="summary_anime" class="col-sm-2 col-form-label">Summary Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="summary_anime" name="summary_anime" value="{{ $detail->summary_anime ?? old('summary_anime') }}">
                    @error('summary_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="rating_anime" class="col-sm-2 col-form-label">Rating Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="rating_anime" name="rating_anime" value="{{ $detail->rating_anime ?? old('rating_anime') }}">
                    @error('rating_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="status_anime" class="col-sm-2 col-form-label">Status Anime</label>
                <div class="col-sm-10">
                    <select name="status_anime" id="status_anime" class="custom-select">
                        <option value="" @if ($detail->status_anime == ''){{ __('selected') }}@endif>Select Status</option>
                        <option value="Ongoing" @if ($detail->status_anime == 'Ongoing'){{ __('selected') }}@endif>Ongoing</option>
                        <option value="Tamat" @if ($detail->status_anime == 'Tamat'){{ __('selected') }}@endif>Tamat</option>
                    </select>

                    @error('status_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="type_anime" class="col-sm-2 col-form-label">Type Anime</label>
                <div class="col-sm-10">
                    <select name="type_anime" id="type_anime" class="custom-select">
                        <option value="" @if ($detail->type_anime == ''){{ __('selected') }}@endif>Select Type</option>
                        <option value="TV" @if ($detail->type_anime == 'TV'){{ __('selected') }}@endif>TV</option>
                        <option value="OVA" @if ($detail->type_anime == 'OVA'){{ __('selected') }}@endif>OVA</option>
                        <option value="Movie" @if ($detail->type_anime == 'Movie'){{ __('selected') }}@endif>Movie</option>
                    </select>

                    @error('type_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="total_anime" class="col-sm-2 col-form-label">Total Episode Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="total_anime" name="total_anime" value="{{ $detail->total_anime ?? old('total_anime') }}">
                    @error('total_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="genre_anime" class="col-sm-2 col-form-label">Genre Anime</label>
                <div class="col-sm-10">
                    <input class="form-control" id="genre_anime" name="genre_anime" value="{{ $detail->genre_anime ?? old('genre_anime') }}">
                    @error('genre_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="jadwal_anime" class="col-sm-2 col-form-label">Jadwal Anime</label>
                <div class="col-sm-10">
                    <select name="jadwal_anime" id="jadwal_anime" class="custom-select">
                        <option value="none">Select Jadwal</option>
                        <option value="Senin" @if ($detail->jadwal_anime == 'Senin'){{ __('selected') }}@endif>Senin</option>
                        <option value="Selasa" @if ($detail->jadwal_anime == 'Selasa'){{ __('selected') }}@endif>Selasa</option>
                        <option value="Rabu" @if ($detail->jadwal_anime == 'Rabu'){{ __('selected') }}@endif>Rabu</option>
                        <option value="Kamis" @if ($detail->jadwal_anime == 'Kamis'){{ __('selected') }}@endif>Kamis</option>
                        <option value="Jumat" @if ($detail->jadwal_anime == 'Jumat'){{ __('selected') }}@endif>Jumat</option>
                        <option value="Sabtu" @if ($detail->jadwal_anime == 'Sabtu'){{ __('selected') }}@endif>Sabtu</option>
                        <option value="Minggu" @if ($detail->jadwal_anime == 'Minggu'){{ __('selected') }}@endif>Minggu</option>
                        <option value="Random" @if ($detail->jadwal_anime == 'Random'){{ __('selected') }}@endif>Random</option>

                        @error('jadwal_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="image_anime" class="col-sm-2 col-form-label">Image Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="image_anime" name="image_anime" value="{{ $detail->image_anime ?? old('image_anime') }}">
                    @error('image_anime')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="background_anime" class="col-sm-2 col-form-label">Background Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="background_anime" name="background_anime" value="{{ $detail->background_anime ?? old('background_anime') }}">
                    @error('background_anime')
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
