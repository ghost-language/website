<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ghost</title>

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="min-h-screen">
        <div class="font-sans antialiased">
            @include('partials._header')

            <main class="container mx-auto relative flex flex-wrap justify-start flex-1 w-full">
                @yield('content')
            </main>
        </div>
    </body>
</html>
