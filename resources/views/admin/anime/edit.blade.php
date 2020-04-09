@extends('layouts.user')

@section('title', 'Edit Anime Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Anime Management</h1>

<a href="{{ route('admin.anime.index') }}" class="btn btn-primary mb-3">Back To Anime</a>
<div class="row">
    <div class="col-lg">

        <form action="{{ url('/admin/anime', $anime->id) }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $anime->id }}">
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="id_anime" class="col-sm-2 col-form-label">Id Anime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_anime" name="id_anime" value="{{ $anime->id_anime ?? old('id_anime') }}">
                    @error('id_anime')
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
