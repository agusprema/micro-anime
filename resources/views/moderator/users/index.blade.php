@extends('layouts.user')

@section('title', 'Users Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Users Management</h1>

<div class="row">
    <div class="col-lg">
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                    <td>
                        <a href="{{route('moderator.users.edit', $user->id)}}" class="btn btn-success float-left"><i class="far fa-edit mr-1"></i>Edit</a>
                        <form action="{{ route('moderator.users.destroy', $user) }}" method="POST" class="float-left ml-1" id="tmbl-delete-{{ $user->id }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger tmbl-delete" value="{{ $user->id }}"><i class="far fa-trash-alt mr-1"></i>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
