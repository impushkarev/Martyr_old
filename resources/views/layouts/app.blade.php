@include('layouts.header')
@include('layouts.footer')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
  
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">

    <title>@yield('title')Martyr</title>
</head>
<body>

    @yield('header')

    <div class="content">
        @yield('content')
    </div>

    @yield('footer')

</body>
</html>