<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap -->
        <link href="{{asset(mix('assets/css/bootstrap.min.css'))}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset(mix('assets/css/fonts.min.css'))}}" rel="stylesheet">
        <!-- AdminLTE -->
        <link href="{{asset(mix('assets/css/AdminLTE.min.css'))}}" rel="stylesheet">
        <!-- App -->
        <link href="{{asset(mix('assets/css/app.css'))}}" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                @yield('content')
                </div>
            </div>
        </div>

        <!-- Jquery -->
        <script src="{{asset(mix('assets/js/jquery.min.js'))}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset(mix('assets/js/bootstrap.min.js'))}}"></script>
        <!-- AdminLTE -->
        <script src="{{asset(mix('assets/js/adminlte.min.js'))}}"></script>
        <!-- App -->
        <script src="{{asset(mix('assets/js/app.min.js'))}}"></script>
        
        @yield('script')
    </body>
</html>
