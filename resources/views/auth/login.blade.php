@extends('layouts.app')

@section('title', 'Авторизация | ')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/static.css') }}">
@endsection

@section('content')

<section class="content-section">
    <h1>Авторизация</h1>
    <div class="container">
        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Ваша почта</label>
                <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus />
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="off" />
            </div>
            <div class="button-container">
                <button type="submit" class="button">
                    Войти
                </button>
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
            @endif
        </form>
    </div>
</section>

@endsection