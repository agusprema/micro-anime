@extends('layouts.user')

@section('title', 'Edit Menu Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Menu Management</h1>

<a href="{{ route('moderator.menu.index') }}" class="btn btn-primary mb-3">Back To Menu</a>
<div class="row">
    <div class="col-lg">

        <form action="{{ url('/moderator/menu', $menu->id) }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $menu->id }}">
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">Menu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="menu" name="menu" value="{{ $menu->menu ?? old('menu') }}">
                    @error('menu')
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
