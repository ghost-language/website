<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165345570-1"></script>

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-165345570-1');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ isset($title) ? $title . ' - ' : null }}Ghost - A small, class-based scripting language</title>

        @if (isset($canonical))
            <link rel="canonical" href="{{ url($canonical) }}">
        @endif

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans antialiased text-gray-900 language-javascript" x-data="{ isOpen: false }">
        <x-header></x-header>
        <x-sidebar></x-sidebar>

        <main>
            <div class="max-w-6xl mx-auto py-12 px-6">
                {{ $slot }}
            </div>
        </main>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
