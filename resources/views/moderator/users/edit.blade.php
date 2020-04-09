@extends('layouts.user')

@section('title', 'Edit User ' . $user->name)

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit User {{ $user->name }}</h1>

<a href="{{ route('moderator.users.index') }}" class="btn btn-primary mb-3">Back To User</a>
<div class="row">
    <div class="col-lg">
        @include('partials.alerts')
        <form action="{{ route('moderator.users.update', $user) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            @foreach ($roles as $role)
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio{{ $loop->iteration }}" class="custom-control-input" name="roles" value="{{ $role->id }}" {{ $user->hasAnyRole($role->name)?'checked':'' }}>
                    <label class="custom-control-label" for="customRadio{{ $loop->iteration }}">{{ $role->name }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
</div>
@endsection
