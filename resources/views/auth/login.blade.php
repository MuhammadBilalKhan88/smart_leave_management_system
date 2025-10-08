@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #6c63ff, #48c6ef);
        font-family: 'Poppins', sans-serif;
    }

    .login-wrapper {
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        background: #fff;
        border-radius: 1.2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        padding: 2.5rem 2rem;
        max-width: 420px;
        width: 100%;
        text-align: center;
        transition: all 0.3s ease;
    }
    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    .login-header {
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        position: relative;
    }
    .login-header::after {
        content: '';
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #6c63ff, #48c6ef);
        display: block;
        margin: 12px auto 0;
        border-radius: 4px;
    }

    .form-label {
        font-weight: 600;
        font-size: 0.95rem;
    }

    .form-control {
        border-radius: 0.8rem;
        padding: 0.75rem 1rem;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 8px rgba(108,99,255,0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #6c63ff, #48c6ef);
        border: none;
        border-radius: 0.8rem;
        padding: 0.65rem 1.5rem;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .btn-link {
        font-weight: 500;
        color: #6c63ff;
        text-decoration: none;
        transition: color 0.3s;
    }
    .btn-link:hover {
        color: #48c6ef;
        text-decoration: underline;
    }

    .form-check-label {
        font-size: 0.9rem;
    }

    .invalid-feedback {
        font-size: 0.85rem;
        color: #e74a3b;
        text-align: left;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">{{ __('Login to your account') }}</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3 text-start">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3 text-start">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check text-start">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                       {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <div class="mt-3">
                    <a class="btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
