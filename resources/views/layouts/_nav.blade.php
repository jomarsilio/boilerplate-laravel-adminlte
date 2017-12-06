<header class="main-header">
    
    {{--  Logo  --}}
    <a href="{{ route('home') }}" class="logo fixed-top">
        {{--  mini logo for sidebar  --}}
        <span class="logo-mini">
            <img src="{{ asset('assets/images/logo-white.png') }}" />
        </span>
        {{--  logo for regular state and mobile devices  --}}
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-white.png') }}" class="mr-1" />
            <b>{{ config('app.name', 'lARAVEL') }}</b>
        </span>
    </a>

    {{--  Header Navbar  --}}
    <nav class="navbar navbar-expand navbar-static-top p-0 fixed-top">

        {{--  Sidebar toggle button  --}}
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu ml-auto">
            <ul class="nav navbar-nav">
            
                {{--  User Account  --}}
                <li class="nav-item dropdown user user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user fa-lg" class="user-image"></i>
                        <span class="d-none d-md-inline">{{ auth()->user()->firstName }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        {{-- User image --}}
                        <li class="user-header dropdown-item">
                            <i aria-hidden="true" class="fa fa-user-circle-o fa-5x text-white"></i>
                            <p class="text-truncate">
                                {{ auth()->user()->shortName }} - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>

                        {{-- User options--}}
                        <li class="user-footer dropdown-item">
                            <div class="float-left">
                                {{ link_to_route('user.profile.edit', trans('user.profile'), [], [
                                    'class' => 'btn btn-secondary btn-flat'
                                ]) }}
                            </div>
                            <div class="float-right">
                                {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                                    {{ Form::submit(trans('auth.sign_out'), [
                                        'class' => 'btn btn-secondary btn-flat'
                                    ]) }}
                                {!! Form::close() !!}
                            </div>
                        </li>
                    </ul>
                </li>
                
                {{--  Sign out  --}}
                <li class="nav-item">
                    {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                        {{ Form::button('<i class="fa fa-sign-out"></i>', [
                            'class' => 'nav-link btn btn-flat bg-light-blue border-0',
                            'type'  => 'submit'
                        ]) }}
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>
    </nav>
</header>