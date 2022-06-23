<!DOCTYPE html>
<html lang="tj">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@hasSection('title')@yield('title'){{ ' – Хирад' }}@else{{'Хирад'}}@endif</title>

        <meta name="keywords" content="китоб, книги, бесплатные книги, онлайн библиотека, купить книги в Таджикистане, читать книги онлайн"/>
        <meta property="og:site_name" content="Хирад">
        <meta property="og:type" content="object" />
        <meta name="twitter:card" content="summary_large_image">

        @hasSection ('meta-tags')
            @yield('meta-tags')
        @else
            <meta name="description" content="“Хирад” – маъбади аҳли илм ва меҳроби поки донишҷӯӣ ва илмомӯзӣ аст. Ҳарки аз китоб ва мутолиа бегона аст, ғариб ва бемӯнис аст.">
            <meta property="og:title" content="Хирад" />
            <meta property="og:description" content="“Хирад” – маъбади аҳли илм ва меҳроби поки донишҷӯӣ ва илмомӯзӣ аст. Ҳарки аз китоб ва мутолиа бегона аст, ғариб ва бемӯнис аст.">
            <meta property="og:image" content="{{ asset('img/main/logo-share.png') }}">
            <meta property="og:image:alt" content="Хирад – Лого">
        @endif

        {{-- Favicons for all devices --}}
        <link rel="icon" href="{{ asset('img/main/cropped-favi-32x32.ico') }}" sizes="32x32">
        <link rel="icon" href="{{ asset('img/main/cropped-favi-192x192.ico') }}" sizes="192x192">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('img/main/cropped-favi-180x180.ico') }}">
        <meta name="msapplication-TileImage" content="{{ asset('img/main/cropped-favi-256x256.ico') }}">

        {{-- Google Roboto & Roboto Condensed Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

        {{-- Material Icons --}}
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

        {{-- Owl Carousel --}}
        <link rel="stylesheet" href="{{ asset('js/plugins/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/owl-carousel/owl.theme.default.min.css') }}">

        {{-- JQformstyler --}}
        <link href="{{ asset('js/plugins/jqformstyler/jquery.formstyler.css') }}" rel="stylesheet">
        <link href="{{ asset('js/plugins/jqformstyler/jquery.formstyler.theme.css') }}" rel="stylesheet">

        {{-- Selectize --}}
        <link href="{{ asset('js/plugins/selectize/dist/css/selectize.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/full/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/full/media.css') }}">
    </head>
    
    <body>
        @include('layouts.header')
        <main class="main" role="main">
            @yield('main')
            <x-scroll-top-button />
        </main>
        @include('layouts.footer')
        
        {{-- JQuery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        {{-- Owl Carousel --}}
        <script src="{{ asset('js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

        {{-- Yandex share buttons --}}
        <script src="https://yastatic.net/share2/share.js"></script>

        {{-- JQformstyler --}}
        <script src="{{ asset('js/plugins//jqformstyler/jquery.formstyler.min.js') }}"></script>

        {{-- Selectize --}}
        <script src="{{ asset('js/plugins/selectize/dist/js/standalone/selectize.min.js') }}"></script>

        @if (request()->route()->getName() == 'contacts')
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAneCOkP0fjY3gOXV9DYFTdA59yWXDvNLw&callback=initMap" async defer></script>
        @endif

        <script src="{{ asset('js/app.js') }}"></script>

        @production
            @include('layouts.analytics')
        @endproduction
    </body>
</html>
