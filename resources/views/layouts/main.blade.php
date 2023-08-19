<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('link')
</head>

<body class="antialiased">
    @include('layouts.header')
    @yield('main')
    <div class="my-5"></div>
    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>
