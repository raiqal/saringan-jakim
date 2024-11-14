<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'JAKIM') }}</title> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <!-- Styles -->
    <style>
        .card-header {
            background-color: #293290;
            border-bottom: 1px solid #293290;
            color: #fff;
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
        }

        .custom-dropdown {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M4.293 5.293a1 1 0 0 1 1.414 0L8 7.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z"/></svg>') !important;
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
            padding-right: 30px; /* Adjust space for the caret */
        }
    </style>
</head>
<body>
    <div id="app">
       

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>