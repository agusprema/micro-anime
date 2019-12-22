@extends('layouts.user')

@section('title', 'Edit Profile User')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Profile User</h1>

<div class="row">
    <div class="col-lg">
        @include('partials.alerts')

        <form action="{{ url('/user/edit-profile') }}" method="post">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? old('name') }}">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                <div class="col-sm-10">
                    <input type="hidden" id="birthday" name="date_of_birth" value="{{ $user->date_of_birth ?? old('date_of_birth') }}">
                    <div class="row">
                        <div class="birtday">
                            @php $birthday = explode("-",$user->date_of_birth); @endphp
                            <select name="birthdaymonth" class="form-control">
                                <option value="0" @if ($birthday[1] == '0'){{ __('selected') }}@endif>Month</option>
                                <option value="01" @if ($birthday[1] == '01'){{ __('selected') }}@endif>Jan</option>
                                <option value="02" @if ($birthday[1] == '02'){{ __('selected') }}@endif>Feb</option>
                                <option value="03" @if ($birthday[1] == '03'){{ __('selected') }}@endif>Mar</option>
                                <option value="04" @if ($birthday[1] == '04'){{ __('selected') }}@endif>Apr</option>
                                <option value="05" @if ($birthday[1] == '05'){{ __('selected') }}@endif>May</option>
                                <option value="06" @if ($birthday[1] == '06'){{ __('selected') }}@endif>Jun</option>
                                <option value="07" @if ($birthday[1] == '07'){{ __('selected') }}@endif>Jul</option>
                                <option value="08" @if ($birthday[1] == '08'){{ __('selected') }}@endif>Aug</option>
                                <option value="09" @if ($birthday[1] == '09'){{ __('selected') }}@endif>Sep</option>
                                <option value="10" @if ($birthday[1] == '10'){{ __('selected') }}@endif>Oct</option>
                                <option value="11" @if ($birthday[1] == '11'){{ __('selected') }}@endif>Nov</option>
                                <option value="12" @if ($birthday[1] == '12'){{ __('selected') }}@endif>Dec</option>
                            </select>
                        </div>
                        <div class="birtday">
                            <select name="birthdayday" class="form-control">
                                <?php function if_fuck($date, $num, $param, $else){if($date == $num){return $param;}else{return $else;}}
                                    for($a=0; $a < 3; $a++){
                                        for($b=0; $b< 10; $b++){
                                            echo '<option value="'. $a.$b .'" '. if_fuck($birthday[2], $a.$b, 'selected', '') .'>'. if_fuck($a.$b, 00, 'Day', $a.$b) .'</option>';
                                        }
                                    }
                                ?>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="birtday">
                            <select name="birthdayyear" class="form-control">
                                <option value="0">Year</option>
                                <?php $last= date('Y')-70; $now = date('Y')-5;
                                for ($x = $now; $x >= $last; $x--) {echo '<option value="'.$x.'" '. if_fuck($birthday[0], $x, 'selected', '') .' >'.$x.'</option>'; } ?>
                            </select>
                        </div>
                    </div>

                    @error('birtday')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @error('birthdayyear')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @error('birthdaymonth')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @error('birthdayday')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <div class="w-100">
                        <div class="custom-control custom-radio float-left pr-2">
                            <input type="radio" value="Female" id="gender1" name="gender" class="custom-control-input" @if ($user->gender == 'Female'){{ __('checked') }}@endif>
                            <label class="custom-control-label" for="gender1">Female</label>
                        </div>
                        <div class="custom-control custom-radio float-left pr-2">
                            <input type="radio" value="Male" id="gender2" name="gender" class="custom-control-input" @if ($user->gender == 'Male'){{ __('checked') }}@endif>
                            <label class="custom-control-label" for="gender2">Male</label>
                        </div>
                        <div class="custom-control custom-radio float-left pr-2">
                            <input type="radio" value="Custom" id="gender3" name="gender" class="custom-control-input" @if ($user->gender == 'Custome'){{ __('checked') }}@endif>
                            <label class="custom-control-label" for="gender3">Custom</label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @error('gender')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="btn" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button id="btn" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
