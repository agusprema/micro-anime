@extends('layouts.user')

@section('title', 'Detail Anime Management')
@section('inc_script')
<script src="{{ asset('js/jquery.amsify.suggestags.js') }}"></script>
<script>$(document).ready(function() {$('input[name="genre_anime"]').amsifySuggestags({suggestions: [@foreach (DB::table('genres')->orderBy('genre')->get() as $genre)'{{ __($genre->genre)}}',@endforeach],whiteList: true});});</script>
@endsection
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Detail Anime Management</h1>

<div class="row">
    <div class="col-lg">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Detail Anime</a>
        @include('partials.alerts')
        <table class="table table-hover" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Anime</th>
                    <th scope="col">Title</th>
                    <th scope="col">Alternativ Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_animes as $detail_anime)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$detail_anime->id_anime}}</td>
                    <td>{{$detail_anime->title_anime}}</td>
                    <td>{{$detail_anime->alternative_title}}</td>
                    <td>
                        <a href="{{route('admin.detail-anime.show', $detail_anime->id)}}"><button type="button" class="btn btn-success float-left ml-1 mb-1">Detail</button></a>
                        <a href="{{route('admin.episode-anime.show', $detail_anime->id_anime)}}"><button type="button" class="btn btn-dark float-left ml-1 mb-1">Episode</button></a>
                        <a href="{{route('admin.detail-anime.edit', $detail_anime->id)}}"><button type="button" class="btn btn-primary float-left ml-1 mb-1">Edit</button></a>
                        <form action="{{ route('admin.detail-anime.destroy', $detail_anime) }}" method="POST" class="float-left ml-1 mb-1">
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
                <h5 class="modal-title" id="newMenuModalLabel">Add New Detail Anime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('admin/detail-anime') }}" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="id_anime" name="id_anime" placeholder="Id Anime" value="{{ old('id_anime') }}">

                        @error('id_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="title_anime" name="title_anime" placeholder="Title Anime" value="{{ old('title_anime') }}">

                        @error('title_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="alternative_title" name="alternative_title" placeholder="Alternativ Title" value="{{ old('alternative_title') }}">

                        @error('alternative_title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summary_anime">Summary Anime</label>
                        <textarea class="form-control" id="summary_anime" name="summary_anime" rows="3" >{{ old('summary_anime') }}</textarea>

                        @error('summary_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="rating_anime" name="rating_anime" placeholder="Rating Anime" value="{{ old('rating_anime') }}">

                        @error('rating_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="vote_anime" name="vote_anime" placeholder="vote Anime" value="{{ old('vote_anime') }}">

                        @error('vote_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="status_anime" id="status_anime" class="custom-select">
                            <option value="" @if (old('status_anime') == ''){{ __('selected') }}@endif>Select Status</option>
                            <option value="Ongoing" @if (old('status_anime') == 'Ongoing'){{ __('selected') }}@endif>Ongoing</option>
                            <option value="Tamat" @if (old('status_anime') == 'Tamat'){{ __('selected') }}@endif>Tamat</option>
                        </select>

                        @error('status_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="type_anime" id="type_anime" class="custom-select">
                            <option value="" @if (old('type_anime') == ''){{ __('selected') }}@endif>Select Type</option>
                            <option value="TV" @if (old('type_anime') == 'TV'){{ __('selected') }}@endif>TV</option>
                            <option value="OVA" @if (old('type_anime') == 'OVA'){{ __('selected') }}@endif>OVA</option>
                            <option value="Movie" @if (old('type_anime') == 'Movie'){{ __('selected') }}@endif>Movie</option>
                        </select>

                        @error('type_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="total_anime" name="total_anime" placeholder="Total Episode Anime" value="{{ old('total_anime') }}">

                        @error('total_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="genre_anime" name="genre_anime" placeholder="Genre Anime" value="{{ old('genre_anime') }}">

                        @error('genre_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="jadwal_anime" id="jadwal_anime" class="custom-select">
                            <option value="none">Select Jadwal</option>
                            <option value="Senin" @if (old('jadwal_anime') == 'Senin'){{ __('selected') }}@endif>Senin</option>
                            <option value="Selasa" @if (old('jadwal_anime') == 'Selasa'){{ __('selected') }}@endif>Selasa</option>
                            <option value="Rabu" @if (old('jadwal_anime') == 'Rabu'){{ __('selected') }}@endif>Rabu</option>
                            <option value="Kamis" @if (old('jadwal_anime') == 'Kamis'){{ __('selected') }}@endif>Kamis</option>
                            <option value="Jumat" @if (old('jadwal_anime') == 'Jumat'){{ __('selected') }}@endif>Jumat</option>
                            <option value="Sabtu" @if (old('jadwal_anime') == 'Sabtu'){{ __('selected') }}@endif>Sabtu</option>
                            <option value="Minggu" @if (old('jadwal_anime') == 'Minggu'){{ __('selected') }}@endif>Minggu</option>
                            <option value="Random" @if (old('jadwal_anime') == 'Random'){{ __('selected') }}@endif>Random</option>

                            @error('jadwal_anime')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <div style="width: 50%;" class="form-check float-left">
                            <input class="form-check-input" type="checkbox" value="Y" id="label_hot" name="label_hot" @if (old('label_hot') == 'Y'){{ __('checked') }}@endif>
                            <label class="form-check-label" for="label_hot">
                                Label Hot Active?
                            </label>
                        </div>

                        <div style="width: 50%;" class="form-check float-left">
                            <input class="form-check-input" type="checkbox" value="Y" id="label_new" name="label_new" @if (old('label_hot') == 'Y'){{ __('checked') }}@elseif(!old('label_hot')){{ __('checked') }}@endif>
                            <label class="form-check-label" for="label_new">
                                Label New Active?
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="image_anime" name="image_anime" placeholder="Image Anime" value="{{ old('image_anime') }}">

                        @error('image_anime')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" id="background_anime" name="background_anime" placeholder="Background Anime" value="{{ old('background_anime') }}">

                        @error('background_anime')
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
