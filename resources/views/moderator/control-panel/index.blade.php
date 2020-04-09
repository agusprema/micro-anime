@extends('layouts.user')

@section('title', 'Control Panel')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Control Panel</h1>

<div class="row">
    @include('partials.alerts')
    <div class="col-lg-6 float-left">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Settings</h6>
            </div>
            <form id="bassic_settings">
                <div class="card-body">
                    @foreach ($bassic_settings as $bassic_setting)
                    <h5 style="color: #121416!important;">{{ $bassic_setting['name'] }}</h5>
                        @if ($bassic_setting['massage'])
                        {{ $bassic_setting['massage'] }}
                        @endif
                    <div class="custom-control custom-radio custom-control-inline mb-1">
                        <input value="true" type="radio" id="{{ $bassic_setting['id_setting'] }}" name="{{ $bassic_setting['id_setting'] }}" class="custom-control-input" @if ($bassic_setting['status'] == 'true'){{ __('checked') }}@endif>
                        <label class="custom-control-label" for="{{ $bassic_setting['id_setting'] }}">On</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline mb-1">
                        <input value="false" type="radio" id="{{ $bassic_setting['id_setting'] }}2" name="{{ $bassic_setting['id_setting'] }}" class="custom-control-input" @if ($bassic_setting['status'] == 'false'){{ __('checked') }}@endif>
                        <label class="custom-control-label" for="{{ $bassic_setting['id_setting'] }}2">Off</label>
                    </div>

                        @foreach ($bassic_setting['extra'] as $bassic_setting_extra)
                            {{ $bassic_setting_extra }}
                        @endforeach

                    @endforeach
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-6 float-left">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Settings</h6>
            </div>
            <div class="card-body">
                @foreach ($user_settings as $user_setting)
                <h5 style="color: #121416!important;">{{ $user_setting['name'] }}</h5>
                    @if ($user_setting['massage'])
                    {{ $user_setting['massage'] }}
                    @endif
                <div class="custom-control custom-radio custom-control-inline mb-1">
                    <input value="true" type="radio" id="{{ $user_setting['id_setting'] }}" name="{{ $user_setting['id_setting'] }}" class="custom-control-input" @if ($user_setting['status'] == 'true'){{ __('checked') }}@endif>
                    <label class="custom-control-label" for="{{ $user_setting['id_setting'] }}">On</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline mb-1">
                    <input value="false" type="radio" id="{{ $user_setting['id_setting'] }}2" name="{{ $user_setting['id_setting'] }}" class="custom-control-input" @if ($user_setting['status'] == 'false'){{ __('checked') }}@endif>
                    <label class="custom-control-label" for="{{ $user_setting['id_setting'] }}2">Off</label>
                </div>
                @endforeach
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>
</div>

<input type="hidden" id="errors_validation" value="@error('*'){{ __('true') }}@enderror">
@endsection
