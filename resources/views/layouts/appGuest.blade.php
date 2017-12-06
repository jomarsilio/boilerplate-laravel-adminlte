<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'lARAVEL') }}</title>

        <!-- Bootstrap -->
        <link href="{{asset(mix('assets/css/bootstrap.min.css'))}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="{{asset(mix('assets/css/fonts.min.css'))}}" rel="stylesheet">
        <!-- AdminLTE -->
        <link href="{{asset(mix('assets/css/AdminLTE.min.css'))}}" rel="stylesheet">
        <!-- App -->
        <link href="{{asset(mix('assets/css/app.css'))}}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body class="bg-gray-200" style="height: auto !important;">

        <!-- Content -->
        @yield('content')

        <!-- Jquery -->
        <script src="{{asset(mix('assets/js/jquery.min.js'))}}"></script>
        <!-- App -->
        <script src="{{asset(mix('assets/js/app.min.js'))}}"></script>
        
        @yield('script')
    </body>
</html>