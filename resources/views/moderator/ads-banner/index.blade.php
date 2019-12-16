@extends('layouts.user')

@section('title', 'Ads Banner Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Ads Banner Management</h1>

<div class="row">
    <div class="col-lg">

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Ads Banner</a>
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Url</th>
                    <th scope="col">Image</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $ads)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $ads->title }}</td>
                    <td>{{ $ads->url }}</td>
                    <td>{{ $ads->image }}</td>
                    <td>{{ $ads->type_for }}</td>
                    <td>
                        <a class="btn btn-success float-left mr-1" href="{{ url('moderator/ads-banner',$ads->id) }}/edit"><i class="far fa-edit mr-1"></i>Edit</a>
                        <form action="{{ url('moderator/ads-banner',$ads->id) }}" method="POST" id="tmbl-delete-{{ $ads->id }}" class="float-left mr-1">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="button" class="btn btn-danger tmbl-delete" value="{{ $ads->id }}"><i class="far fa-trash-alt mr-1"></i>Delete</button>
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

            <form action="{{ url('moderator/ads-banner') }}" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title Ads" value="{{ old('title') }}">

                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url Ads" value="{{ old('url') }}">

                        @error('url')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="image" name="image" placeholder="Image Ads" value="{{ old('image') }}">

                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="type_for" id="type_for" class="custom-select">
                            <option value="">Select Type Ads</option>
                            <option value="home" @if (old('type_for') == 'home')selected @endif>Home</option>
                            <option value="anime" @if (old('type_for') == 'anime')selected @endif>Anime</option>
                            <option value="footer" @if (old('type_for') == 'footer')selected @endif>Footer</option>
                            <option value="announcements" @if (old('type_for') == 'announcements')selected @endif>Announcements</option>
                        </select>

                        @error('type_for')
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
