<!DOCTYPE html>
<html>
    <head lang="es">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="Juan" content="Project">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('web_title', 'Inicio') | {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/styles_add.css') }} ">
 

    </head> 
    <body>
    @yield('content')
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ asset('js/select.js') }}" ></script>
    </body>
</html>
