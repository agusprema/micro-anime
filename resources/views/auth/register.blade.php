@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="card o-hidden login-page border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="{{ route('register') }}">
                            <div class="form-group">
                                <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <small class="text-danger pl-4">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <small class="text-danger pl-4">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="birthday" name="birthday" value="{{ old('birthday') }}" required>
                                <div class="row">
                                    <div class="birtday">
                                        <select name="birthdaymonth" class="form-control" required>
                                            <option value="0" @if (old('birthdaymonth') == '0')selected @endif>Month</option>
                                            <option value="01" @if (old('birthdaymonth') == '01')selected @endif>Jan</option>
                                            <option value="02" @if (old('birthdaymonth') == '02')selected @endif>Feb</option>
                                            <option value="03" @if (old('birthdaymonth') == '03')selected @endif>Mar</option>
                                            <option value="04" @if (old('birthdaymonth') == '04')selected @endif>Apr</option>
                                            <option value="05" @if (old('birthdaymonth') == '05')selected @endif>May</option>
                                            <option value="06" @if (old('birthdaymonth') == '06')selected @endif>Jun</option>
                                            <option value="07" @if (old('birthdaymonth') == '07')selected @endif>Jul</option>
                                            <option value="08" @if (old('birthdaymonth') == '08')selected @endif>Aug</option>
                                            <option value="09" @if (old('birthdaymonth') == '09')selected @endif>Sep</option>
                                            <option value="10" @if (old('birthdaymonth') == '10')selected @endif>Oct</option>
                                            <option value="11" @if (old('birthdaymonth') == '11')selected @endif>Nov</option>
                                            <option value="12" @if (old('birthdaymonth') == '12')selected @endif>Dec</option>
                                        </select>
                                    </div>
                                    <div class="birtday">
                                        <select name="birthdayday" class="form-control" required>
                                            <option value="0">Day</option>
                                            @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}" @if (old('birthdayday') == $i)selected @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="birtday">
                                        <select name="birthdayyear" class="form-control" required>
                                            <option value="0">Year</option>
                                            @php
                                                $now = date('Y') - 12; $old = $now - 70;
                                            @endphp
                                            @for ($i = $now; $i >= $old; $i--)
                                            <option value="{{ $i }}" @if (old('birthdayyear') == $i)selected @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                @error('birthday')
                                    <small class="text-danger pl-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="w-100">
                                    <div class="custom-control custom-radio float-left pr-2">
                                        <input type="radio" value="Female" id="gender1" name="gender" class="custom-control-input" @if (old('gender') == 'Femele')checked @endif required>
                                        <label class="custom-control-label" for="gender1">Female</label>
                                    </div>
                                    <div class="custom-control custom-radio float-left pr-2">
                                        <input type="radio" value="Male" id="gender2" name="gender" class="custom-control-input" @if (old('gender') == 'Male')checked @endif required>
                                        <label class="custom-control-label" for="gender2">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio float-left pr-2">
                                        <input type="radio" value="Custom" id="gender3" name="gender" class="custom-control-input" @if (old('gender') == 'Custome')checked @endif required>
                                        <label class="custom-control-label" for="gender3">Custom</label>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @error('gender')
                                    <small class="text-danger pl-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                                </div>
                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" class="form-control form-control-user" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                @error('password')
                                <small class="text-danger pl-4">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Register Account') }}</button>
                            @csrf
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('home') }}">
                                {{ __('Back to Home?') }}
                            </a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div>
                        @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
