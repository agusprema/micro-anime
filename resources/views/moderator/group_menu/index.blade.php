@extends('layouts.user')

@section('title', 'Group Menu Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Group Menu Management</h1>

<div class="row">
    <div class="col-lg">

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Group Menu</a>
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Group</th>
                    <th scope="col">Menu</th>
                    <th scope="col">icon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $groups)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $groups->name }}</td>
                    <td>{{ $groups->menu }}</td>
                    <td>{{ $groups->icon }}</td>
                    <td>
                        <a class="btn btn-success float-left mr-1" href="{{ url('moderator/group-menu',$groups->id) }}/edit"><i class="far fa-edit mr-1"></i>Edit</a>
                        <form action="{{ url('moderator/group-menu',$groups->id) }}" method="POST" id="tmbl-delete-{{ $groups->id }}" class="float-left mr-1">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="button" class="btn btn-danger tmbl-delete" value="{{ $groups->id }}"><i class="far fa-trash-alt mr-1"></i>Delete</button>
                        </form>
                        <div class="clearfix"></div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('moderator/group-menu') }}" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name Role" value="{{ old('name') }}">

                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="custom-select">
                            <option value="">Select Menu</option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" @if (old('menu_id') == $menu->id)selected @endif>{{ $menu->menu }}</option>
                            @endforeach
                        </select>

                        @error('menu_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" value="{{ old('icon') }}">

                        @error('icon')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                @csrf
            </form>

        </div>
    </div>
</div>
<input type="hidden" id="errors_validation" value="@error('*'){{ __('true') }}@enderror">
@endsection
