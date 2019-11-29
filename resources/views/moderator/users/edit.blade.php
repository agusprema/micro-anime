@extends('layouts.user')

@section('title', 'Edit User ' . $user->name)

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit User {{ $user->name }}</h1>

<div class="row">
    <div class="col-lg">
        @include('partials.alerts')
        <form action="{{ route('moderator.users.update', $user) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            @foreach ($roles as $role)
                <div class="form-check">
                    <input type="radio" name="roles" value="{{ $role->id }}" {{ $user->hasAnyRole($role->name)?'checked':'' }}>
                    <label>{{ $role->name }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
