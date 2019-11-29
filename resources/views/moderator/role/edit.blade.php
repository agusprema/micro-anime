@extends('layouts.user')

@section('title', 'Edit Role '. $role->name .' Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Role {{ $role->name }} Management</h1>

<div class="row">
    <div class="col-lg">

        @include('partials.alerts')

        <form action="{{ url('/moderator/role') . '/' . $role->id }}" method="post">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $role->id }}">
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="role" name="name" value="{{ $role->name ?? old('name') }}">
                    @error('name')
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
