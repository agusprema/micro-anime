@extends('layouts.user')

@section('title', 'Detail Episode Anime '.$title_anime.' Management')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Detail Episode Anime {{$title_anime}} Management</h1>

<div class="row">
    <div class="col-lg">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Episode Anime</a>
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Episode</th>
                    <th scope="col">Video</th>
                    <th scope="col">Download</th>
                    <th scope="col">Next</th>
                    <th scope="col">Prev</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($episodes as $episode)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ str_replace('-', " ", str_replace($episode->id_anime.'-', "",$episode->episode))}}</td>
                    <td>{{$episode->video}}</td>
                    <td>{{$episode->download}}</td>
                    <td>{{ str_replace('-', " ", str_replace($episode->id_anime.'-', "",$episode->next))}}</td>
                    <td>{{ str_replace('-', " ", str_replace($episode->id_anime.'-', "",$episode->prev))}}</td>
                    <td>
                        <a href="{{route('admin.episode-anime.edit', strtolower($episode->episode))}}"><button type="button" class="btn btn-primary float-left ml-1 mb-1">Edit</button></a>
                        <form action="{{ route('admin.episode-anime.destroy', $episode) }}" method="POST" class="float-left ml-1 mb-1" id="tmbl-delete-{{ $episode->id }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-warning tmbl-delete" value="{{ $episode->id }}">Delete</button>
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
                <h5 class="modal-title" id="newMenuModalLabel">Add New Episode Anime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('admin/episode-anime') }}" method="post">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_anime" name="id_anime" placeholder="Id Anime" value="{{ $id_anim }}" readonly>

                    <div class="form-group">
                        <input type="text" class="form-control" id="episode" name="episode" placeholder="Episode Anime" value="{{ old('episode') ?? $episode2 + 1 }}">

                        @error('episode')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="video" name="video" placeholder="Video Anime" value="{{ old('video') }}">

                        @error('video')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="download" name="download" placeholder="Download Anime" value="{{ old('download') }}">

                        @error('download')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="next" name="next" placeholder="Next" value="{{ old('next') }}">

                        @error('next')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="prev" name="prev" placeholder="Prev" value="{{ old('prev') ?? $episode2 }}">

                        @error('prev')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Y" id="from_micro" name="from_micro" checked>
                            <label class="form-check-label" for="from_micro">
                                From Micro Cloud?
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
