<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-google />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ isset($title) ? $title . ' - ' : null }}Ghost - A small, class-based scripting language</title>

        @if (isset($canonical))
            <link rel="canonical" href="{{ url($canonical) }}">
        @endif

        {{-- Favicons --}}
        <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="/img/favicon/manifest.json">

        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans antialiased text-gray-900 fixed overflow-hidden w-full min-h-full flex">
        <div id="app" class="flex w-full flex-col">
            <header class="w-full bg-gray-800 text-white text-sm flex items-center leading-none font-semibold font-mono border-t-4 border-indigo-500 px-6 justify-between">
                <div class="flex justify-between h-16">
                    <a href="/" class="flex-shrink-0 flex items-center" alt="Home">
                        <img class="block lg:hidden h-5 w-auto" src="/img/logo-white.svg" alt="Ghost" />
                        <img class="hidden lg:block h-5 w-auto" src="/img/logo-text-white.svg" alt="Ghost" />
                    </a>
                </div>

                <span class="leading-none">
                    {{ LATEST_VERSION }}
                </span>
            </header>

            <main class="flex-auto relative border-t border-gray-700">
                {{ $slot }}
            </main>
        </div>

        <script src="/js/wasm_exec.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
        {{ $scripts ?? '' }}
    </body>
</html>
