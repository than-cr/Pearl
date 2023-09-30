@extends('layouts.app')

@section('content')

    <div class="container-fluid bg-300 dark__bg-1200">
        <div class="bg-holder bg-auth-card-overlay">
        </div>

        <div class="row flex-center position-relative min-vh-100 g-0 py-5 pb-15">
            <div class="col-11 col-sm-10 col-xl-8">
                <div class="card border border-200 auth-card">
                    <div class="card-body pe-md-0">
                        <div class="row align-items-center gx-0 gy-7">
                            <div class="col mx-auto">
                                <div class="auth-form-box">
                                    <div class="text-center mb-0">
                                        <h3 class="text-1000">Sign In</h3>
                                        <p class="text-700">Get access to your acount.</p>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-3 text-start">
                                            <label class="form-label" for="email">Email Address</label>
                                            <div class="form-icon-container">
                                                <input class="form-control form-icon-input @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="name@example.com"/>
                                                <span class="fas fa-user text-900 fs--1 form-icon"></span>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 text-start">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="form-icon-container">
                                                <input class="form-control form-icon-input @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password"/>
                                                <span class="fas fa-key text-900 fs--1 form-icon"></span>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row flex-between-center mb-7">
                                            <div class="col-auto">
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" id="remember" name="remember" type="checkbox" checked="checked"/>
                                                    <label class="form-check-label mb-0" for="remember">Remember me</label>
                                                </div>
                                            </div>

                                            @if (Route::has('password.request'))
                                                <div class="col-auto">
                                                    <a class="fs--1 fw-semi-bold" href="{{ route('password.request') }}">Forgot Password?</a>
                                                </div>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
