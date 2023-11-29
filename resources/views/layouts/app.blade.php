<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog Me</title>

       
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="antialiased">
       @yield('content')
       @stack('scripts')
       
       @livewireScripts
    </body>
</html>
