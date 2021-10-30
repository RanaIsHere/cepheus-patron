<!doctype html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Language" content="en" />
        <meta name="msapplication-TileColor" content="#2d89ef">
        <meta name="theme-color" content="#4188c9">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
        <!-- Generated: 2018-04-16 09:29:05 +0200 -->
        <title>Cepheus Patron - {{ $page }}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        {{-- @if (Cookie::get('theme') != "LIGHT") --}}
            <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
            {{-- <link rel="stylesheet" href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css"> --}}
        {{-- @else
            <link rel="stylesheet" href="../css/dashboard_dark.css">
        @endif --}}
    </head>

    <body class="">
        <div class="content">
            @yield('container')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
        <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        {{-- <script src="https://unpkg.com/@tabler/core@latest/dist/js/tabler.min.js"></script> --}}
        <script src="{{ asset('/js/sum.js') }}"></script>
        <script src="{{ asset('/js/main.js') }}"></script>
        @if ($page == 'Profits')
            <script src="{{ asset('/js/reports.js') }}"></script>
        @endif
        <script src="{{ asset('/js/settings.js') }}"></script>
        @if ($page == 'Invoices')
            <script src="{{ asset('js/invoice.js') }}"></script>
        @endif
    </body>
</html>