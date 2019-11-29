@extends('layouts.user')

@section('title', 'Anime Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Anime Management</h1>

<div class="row">
    <div class="col-lg">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Anime</a>
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Anime</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animes as $anime)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$anime->id_anime}}</td>
                    <td>
                        <a href="{{route('admin.anime.edit', $anime->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                        <form action="{{ route('admin.anime.destroy', $anime) }}" method="POST" class="float-left ml-1">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
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
                <h5 class="modal-title" id="newMenuModalLabel">Add New Anime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('admin/anime') }}" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="id_anime" name="id_anime" placeholder="Id Anime" value="{{ old('id_anime') }}">

                        @error('id_anime')
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
@endsection
