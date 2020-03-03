@extends('layouts.user')

@section('title', 'Ads Video Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Ads Video Management</h1>

<div class="row">
    <div class="col-lg">

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Ads Video</a>
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Message</th>
                    <th scope="col">Url</th>
                    <th scope="col">Video</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date Expired</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $ads)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $ads->message }}</td>
                    <td>{{ $ads->url }}</td>
                    <td>{{ $ads->video }}</td>
                    <td>{{ $ads->type_for }}</td>
                    <td>{{ $ads->expired }}</td>
                    <td>
                        <a class="btn btn-success float-left mr-1" href="{{ url('moderator/ads-video',$ads->id) }}/edit"><i class="far fa-edit mr-1"></i>Edit</a>
                        <form action="{{ url('moderator/ads-video',$ads->id) }}" method="POST" id="tmbl-delete-{{ $ads->id }}" class="float-left mr-1">
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
                <h5 class="modal-title" id="newMenuModalLabel">Add New Ads Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('moderator/ads-video') }}" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="message" name="message" placeholder="Message Ads" value="{{ old('message') }}">

                        @error('message')
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
                        <input type="text" class="form-control" id="video" name="video" placeholder="video Ads" value="{{ old('video') }}">

                        @error('video')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="type_for" id="type_for" class="custom-select">
                            <option value="">Select Type Ads</option>
                            <option value="preroll" @if (old('type_for') == 'preroll')selected @endif>Preroll</option>
                            <option value="postroll" @if (old('type_for') == 'postroll')selected @endif>Postroll</option>
                        </select>

                        @error('type_for')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="date" name="expired" max="{{ date('Y') }}-12-31" min="{{ date('Y') }}-01-01" class="form-control" placeholder="Date Expired Ads" value="{{ old('expired') }}">

                        @error('expired')
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
