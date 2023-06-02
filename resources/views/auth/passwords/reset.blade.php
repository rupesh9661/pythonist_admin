
@extends('layouts.auth_master')

@section('main')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="/" class="logo d-flex align-items-center w-auto">
                            <img src="{{asset('images/logo.png')}}" alt="">
                            <span class="d-none d-lg-block">Royal Techno School</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                            </div>

                            <form class="row g-3 needs-validation" method="POST" action="{{route('password.update')}}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="row mb-3">
                                    
                                    <div class="col-12 mb-3">
                                        <label for="email" class="">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
        
                                    
                                    <div class="col-12 mb-3">
                                        <label for="password" class="">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                               
                                    
                                    <div class="col-12 mb-3">
                                        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                            
                                    <div class="col-12 mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="credits">
                        Designed & Developed by <a href="https://pythonistindia.com/">Pythonist India</a>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>
@endsection