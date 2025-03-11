<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registration | International Assembly</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

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
            padding-right: 30px; 
        }

        header, footer {
            background: linear-gradient(to right, #401515, #F44336);
            color: #FFD700;
            padding: 20px 30px;
            text-align: center;
            font-size: 1.75rem;
            font-weight: bold;
            border-bottom: 3px solid #FFD700;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        footer {
            font-size: 1.2rem;
            border-top: 3px solid #FFD700;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer a {
            color: #FFD700;
            text-decoration: none;
            font-weight: normal;
        }

        footer a:hover {
            text-decoration: underline;
        }

        main {
            margin: 20px;
        }

        .select2-container .select2-selection--single {
            height: calc(2.25rem + 2px); 
            padding: 0.375rem 0.375rem; 
            border: 1px solid #ced4da; 
            border-radius: 0.375rem; 
            background-color: #fff; 
            box-shadow: inset 0 1px 2px rgb(0 0 0 / 8%); 
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: calc(1.75rem); 
        }

        .select2-container .select2-selection--single .select2-selection__arrow {
            height: calc(2.25rem); 
        }

        .select2-container--default .select2-selection--single {
            border-color: #ced4da;
        }

        .select2-container--default .select2-selection--single:hover {
            border-color: #80bdff; 
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #80bdff; 
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); 
        }

        .card-title {
            font-weight: bold;
        }

    </style>

    @stack('styles')
</head>
<body>
    <div id="app">
        <header>
            REGISTRATION OF PARTICIPANT FOR 64TH INTERNATIONAL ASSEMBLY MALAYSIA SCREENING SESSION
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <div>
                <img src="{{ asset('images/LOGO_JAKIM.png') }}" alt="Logo" style="height: 50px; margin-right: 20px;">
                <img src="{{ asset('images/JATA_NEGARA.png') }}" alt="Logo" style="height: 50px;">
                <p>Department of Islamic Development Malaysia (JAKIM)</p>
                <p>Block A and B, Putrajaya Islamic Complex,</p>
                <p>No.23, Jalan Tunku Abdul Rahman, Precinct 3,</p>
                <p>62100 Putrajaya</p>
                <p>📞 03-8870 7000 | 📠 03-8870 7003</p>
                <p>📧 <a href="mailto:mthqk@islam.gov.my">mthqk@islam.gov.my</a></p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/78618f83a2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>
</html>
