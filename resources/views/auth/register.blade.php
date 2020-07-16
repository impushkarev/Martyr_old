@extends('layouts.app')

@section('title', 'Регистрация | ')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/static.css') }}">
@endsection

@section('content')

<section class="content-section">
    <h1>Регистрация</h1>
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Фамилия и Имя</label>
                <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Почта</label>
                <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Повторите пароль</label>
                <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="off">
            </div>
            <div class="button-container">
                <button type="submit" class="button">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
</section>

@endsection