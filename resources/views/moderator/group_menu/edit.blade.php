@extends('layouts.user')

@section('title', 'Edit Group Menu Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Group Menu Management</h1>

<div class="row">
    <div class="col-lg">

        @include('partials.alerts')

        <form action="{{ url('/moderator/group-menu', $menu_groups->id) }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $menu_groups->id }}">
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $menu_groups->name ?? old('name') }}">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Menu</label>
                <div class="col-sm-10">
                    <select name="menu_id" id="menu_id" class="custom-select">
                        <option value="">Select Menu</option>
                        @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" @if (old('menu_id') == $menu->id OR $menu->id == $menu_groups->menu_id)selected @endif>{{ $menu->menu }}</option>
                        @endforeach
                    </select>
                    @error('menu_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="icon" name="icon" value="{{ $menu_groups->icon ?? old('icon') }}">
                    @error('icon')
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
