@extends('layouts.app')
@include('layouts.team_list')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

    <section class="content-section">
        <h1>@yield('admin_section_title')</h1>
        <div class="container">
            @yield('admin_panels')
            <div class="panel panel3">
                @yield('team_list')
            </div>
        </div>
    </section>

@endsection