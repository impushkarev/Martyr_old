@extends('layouts.app')

{{-- STYLES --}}
@section('styles')

    <link rel="stylesheet" href="{{ asset('css/static.css') }}">

@endsection

{{-- HTML --}}
@section('content')

    <section class="preview" style="background-image: url('{{ asset('img/static/b1.jpg') }}')">
        <h1>@yield('static_title')</h1>
    </section>
    
    <section class="content-section">
        <div class="container"> 
            @yield('static_content')
        </div>
    </section>

@endsection