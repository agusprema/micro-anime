@extends('layouts.user')

@section('title', 'Sub Menu Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Sub Menu Management</h1>

<div class="row">
    <div class="col-lg">

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Sub Menu</a>
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Group</th>
                    <th scope="col">Url</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sub_menus as $sub_menu)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $sub_menu->title }}</td>
                    <td>{{ $sub_menu->menu }}</td>
                    <td>{{ $sub_menu->g_name }}</td>
                    <td>{{ $sub_menu->url }}</td>
                    <td>{{ $sub_menu->icon }}</td>
                    <td>{{ $sub_menu->is_active }}</td>
                    <td>
                        <a class="btn btn-success float-left mr-1" href="{{ url('moderator/submenu',$sub_menu->id) }}/edit"><i class="far fa-edit mr-1"></i>Edit</a>
                        <form action="{{ url('moderator/submenu',$sub_menu->id) }}" method="POST" id="tmbl-delete-{{ $sub_menu->id }}" class="float-left mr-1">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="button" class="btn btn-danger tmbl-delete" value="{{ $sub_menu->id }}"><i class="far fa-trash-alt mr-1"></i>Delete</button>
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

            <form action="{{ url('moderator/submenu') }}" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">

                        @error('title')
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
                        <select name="group_id" id="group_id" class="custom-select">
                            <option value="0">Select Menu</option>
                            @foreach ($groups as $group)
                            <option value="{{ $group->id }}" @if (old('group_id') == $group->id)selected @endif>{{ $group->name }}</option>
                            @endforeach
                        </select>

                        @error('group_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url" value="{{ old('url') }}">

                        @error('url')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" value="{{ old('icon') }}">

                        @error('icon')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
@endsection
