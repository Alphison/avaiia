<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('section-styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon.svg') }}">
    <title>{{ config('app.name') }}</title>
    <meta name="mailru-domain" content="5wXizBfO2VjJhGaX" />

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(95693757, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/95693757" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <script src="https://cdn.jsdelivr.net/npm/inputmask"></script>
    
</head>
<body>
<div id="app">
    @include('components.Header')

    @if(session()->has('success'))
        <div class="notification_cart">
            <p class="notification__text">{{ session('success') }}</p>
        </div>
    @endif

    @yield('content')

    @include('components.Footer')
</div>

@vite(['resources/scss/style.scss', 'resources/js/main.js'])
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>
