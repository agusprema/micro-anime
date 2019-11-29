@extends('layouts.user')

@section('title', 'Edit Sub Menu Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Sub Menu Management</h1>

<div class="row">
    <div class="col-lg">

        @include('partials.alerts')

        <form action="{{ url('/moderator/submenu',$sub_menu_users->id) }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $sub_menu_users->id }}">
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $sub_menu_users->title ?? old('title') }}">
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
                        <option value="{{ $menu->id }}" @if (old('menu_id') == $menu->id OR $menu->id == $sub_menu_users->menu_id)selected @endif>{{ $menu->menu }}</option>
                        @endforeach
                    </select>
                    @error('menu_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Group</label>
                <div class="col-sm-10">
                    <select name="group_id" id="group_id" class="custom-select">
                        <option value="0">Select Menu</option>
                        @foreach ($groups as $group)
                        <option value="{{ $group->id }}" @if (old('group_id') == $group->id OR $group->id == $sub_menu_users->group_id)selected @endif>{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="{{ $sub_menu_users->url ?? old('url') }}">
                    @error('url')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="icon" name="icon" value="{{ $sub_menu_users->icon ?? old('icon') }}">
                    @error('icon')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="is_active" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" @if ($sub_menu_users->is_active == 1)checked @endif>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
