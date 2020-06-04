<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Ghost</title>

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans antialiased text-gray-900">
        @include('partials._header')

        <main>
            <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>