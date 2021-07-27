<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        //Jos localstoragessa ei ole login_tokenia. jos tätä ei ole, niin näkyy spa sisältö sekunnin ajan.
        if( !localStorage.hasOwnProperty("login_token") ) {
            window.location.replace("/");   //siirry etusivulle
        }
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">  {{-- Tähän divin sisälle tulee Vue --}}
        <app-container></app-container>  {{-- Renderöidään sivulle mitä halutaan käyttää, tässä tapaukseesa app-container --}}
    </div>
</body>
</html>
