@extends('layouts.app')

@section('content')
<div class="container mt-5"> <!-- Added margin-top to container -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style="background-color: #d5b079; color: white;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Card and Form Styling */
    .card {
        border: none;
        border-radius: 10px;
        background-color: #f8f1e1; /* Pastel beige background */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #a57c58; /* Light brown for header */
        color: white;
        font-weight: bold;
    }

    .card-body {
        padding: 2rem;
    }

    /* Input Fields */
    .form-control {
        border-radius: 30px;
        padding: 12px;
        border: 1px solid #d4bfa5; /* Light brown border */
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #c0875f; /* Darker brown for focus state */
        box-shadow: 0 0 8px rgba(192, 135, 95, 0.5);
    }

    /* Button Styling */
    .btn {
        
        color: white;
        border-radius: 30px;
        padding: 10px 30px;
        font-size: 1.1rem;
        border: none;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #8f5c3b; /* Darker brown on hover */
        border-color: #8f5c3b;
    }

    /* Forgot Password Link */
    .btn-link {
        color: #a57c58;
        text-decoration: none;
    }

    .btn-link:hover {
        color: #8f5c3b; /* Darker brown on hover */
    }

    /* Form Check */
    .form-check-label {
        font-size: 1rem;
        color: #333;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }

        .btn {
            width: 100%;
        }
    }
</style>
@endsection
