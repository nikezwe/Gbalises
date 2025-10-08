
@extends('layouts.app')
@section('title', 'Connexion')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card shadow p-4" style="max-width:400px;width:100%;border-radius:1rem;background:rgba(255,255,255,0.97);">
        <h2 class="mb-4 text-center" style="color:#798c6f;font-weight:bold;"><img src="{{ asset('images/micro.jpeg') }}"></h2>
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('register') }}" class="text-decoration-none">Créer un compte</a>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié ?</a>
                @endif
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
    </div>
</div>
@endsection
