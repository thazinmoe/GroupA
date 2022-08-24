<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Travel Package') }}</title>
    <!-- Fonts & Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/bootstrap/css/bootstrap.min.css') }}">
    
    @stack('style-alt')
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/reset.css') }} " />
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/common.css') }} " />
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/package-list.css') }} " />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/contactstyle.css') }}" />

    

</head>
<body>


    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('frontend/assets/libraries/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('frontend/assets/libraries/jquery-3.6.0.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src=" {{ asset('frontend/assets/js/common.js') }} "></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->

    @stack('script-alt')
</body>
</html>
