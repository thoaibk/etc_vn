@extends('frontend.layouts.master')
@section('title', 'Đăng nhập')
@section('content')

<div class="container p-xlg-5 p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-auth">
                <div class="card-header text-center text-uppercase text-white text-bold"><strong>{{ __('Đăng nhập') }}</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                       placeholder="Email"
                                       required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                       placeholder="Password"
                                       required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lưu đăng nhập') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary d-block btn-auth">
                                    {{ __('Đăng nhập') }}
                                </button>

                                <div class="d-flex flex-content-between">

                                    @if (Route::has('password.request'))
                                        <a class="mt-2 btn-link" href="{{ route('password.request') }}">
                                            {{ __('Bạn quên mật khẩu?') }}
                                        </a>
                                    @endif
                                    <a class="mt-2 btn-link" href="{{ route('register') }}">
                                        {{ __('Đăng ký ') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
