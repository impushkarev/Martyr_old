@extends('layouts.app')

@section('title', 'Проекты | ')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/news.css') }}">

@endsection

@section('content')

    <section class="projects-list">
        <h1>Проекты</h1>
        <div class="container">
            @each('news._news', $news, 'news')
        </div>
    </section>

@endsection