@extends('layouts.user')

@section('title', 'Menu Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Menu Management</h1>

<div class="row">
    <div class="col-lg">

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $menu->menu }}</td>
                    <td>
                        <a class="btn btn-success float-left" href="{{ url('moderator/menu',$menu->id) }}/edit"><i class="far fa-edit mr-1"></i>Edit</a>
                        <form action="{{ url('moderator/menu',$menu->id) }}" method="POST" id="tmbl-delete-{{ $menu->id }}" class="float-left ml-1">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="button" class="btn btn-danger tmbl-delete" value="{{ $menu->id }}"><i class="far fa-trash-alt mr-1"></i>Delete</button>
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

            <form action="{{ url('moderator/menu') }}" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name" value="{{ old('menu') }}">

                        @error('menu')
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
