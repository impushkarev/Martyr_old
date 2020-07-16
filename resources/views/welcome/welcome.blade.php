@extends('layouts.app')

@include('welcome._best')
@include('welcome._last')
@include('welcome._announce')

{{-- SCRIPTS --}}
@section('scripts')

    <script src="{{ asset('js/welcome.js') }}"></script>

@endsection

{{-- STYLE --}}
@section('styles')

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

@endsection

{{-- HTML --}}
@section('content')

    @yield('best-projects')
    @yield('last-collection')
    @yield('announcement')

@endsection