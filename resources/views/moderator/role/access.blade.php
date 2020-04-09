@extends('layouts.user')

@php
    function access($role_id, $menu_id){
        $check = DB::table('access_menu_users')->where('role_id', $role_id)->where('menu_id', $menu_id)->count();

        if ($check > 0){
            return "checked='checked'";
        }
    }

    $name_role = DB::table('roles')->where('id', $roles->id)->first();
@endphp

@section('title', 'Role '. $name_role->name .' Management')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Role {{ $name_role->name }} Management</h1>

<a href="{{ route('moderator.role.index') }}" class="btn btn-primary mb-3">Back To Role</a>
<div class="row">
    <div class="col-lg">
        @include('partials.alerts')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Access</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $menu->menu }}</td>
                    <td>
                        <div class="form-check">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input rolee" id="customCheck1" {{ access($roles->id, $menu->id) }} data-token="{{ csrf_token() }}" data-role="{{ $roles->id }}" data-menu="{{ $menu->id }}">
                                <label class="custom-control-label" for="customCheck1"></label>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
