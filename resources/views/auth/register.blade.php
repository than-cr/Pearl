@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-300 dark__bg-1200">
        <div class="bg-holder bg-auth-card-overlay"></div>
        <div class="row flex-center position-relative min-vh-85 g-0 py-5 pb-15">
            <div class="col-8 col-sm-6 col-xl-4">
                <div class="card border border-200 auth-card">
                    <div class="card-body pe-md-0">
                        <div class="row align-items-center gx-0 gy-7">
                            <div class="col mx-auto">
                                <div class="auth-form-box">
                                    <div class="text-center mb-7">
                                        <h3 class="text-1000">Sign Up</h3>
                                        <p class="text-700">Create your account</p>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="mb-3 text-start">
                                                <label class="form-label" for="name">Name</label>
                                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 text-start">
                                                <label class="form-label" for="lastName">Last Name</label>
                                                <input class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" type="text" placeholder="Last name">

                                                @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 text-start">
                                                <label class="form-label" for="email">Email address</label>
                                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="name@example.com">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 text-start">
                                                <label class="form-label" for="password">Password</label>
                                                <input class="form-control form-icon-input @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 text-start">
                                                <label class="form-label" for="password-confirm">Confirm Password</label>
                                                <input class="form-control form-icon-input @error('password-confirm') is-invalid @enderror" id="password-confirm" name="password_confirmation" type="password" placeholder="Password">

                                                @error('password-confirm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>
                                            <div class="text-center">
                                                <a class="fs--1 fw-bold" href="/login">Sign in to an existing account.</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
