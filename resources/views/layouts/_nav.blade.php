<header class="main-header">
    
    {{--  Logo  --}}
    <a href="{{ route('home') }}" class="logo">
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
    <nav class="navbar navbar-expand navbar-static-top p-0">

        {{--  Sidebar toggle button  --}}
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu ml-auto">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="nav-item dropdown messages-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge badge-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header dropdown-item">You have 4 messages</li>
                        <li class="dropdown-item p-0">
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="float-left">
                                            <img src="{{ asset('assets/images/user2-160x160.jpg') }}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <li>
                                    <a href="#">
                                        <div class="float-left">
                                            <img src="{{ asset('assets/images/user3-128x128.jpg') }}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="float-left">
                                            <img src="{{ asset('assets/images/user4-128x128.jpg') }}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="float-left">
                                            <img src="{{ asset('assets/images/user3-128x128.jpg') }}" class="rounded-circle" alt="User Image">
                                        </div>
                                    <h4>
                                        Sales Department
                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="float-left">
                                            <img src="{{ asset('assets/images/user4-128x128.jpg') }}" class="rounded-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer dropdown-item"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="nav-item dropdown notifications-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header dropdown-item">You have 10 notifications</li>
                        <li class="dropdown-item p-0">
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                        page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer dropdown-item"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="nav-item dropdown tasks-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="badge badge-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header dropdown-item">You have 9 tasks</li>
                        <li class="dropdown-item p-0">
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="float-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="float-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                    <h3>
                                        Some task I need to do
                                        <small class="float-right">60%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="float-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer dropdown-item">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="nav-item dropdown user user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/images/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header dropdown-item">
                            <img src="{{ asset('assets/images/user2-160x160.jpg') }}" class="rounded-circle" alt="User Image">
                            <p>
                                {{ auth()->user()->name }} - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body dropdown-item">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer dropdown-item">
                            <div class="float-left">
                                <a href="#" class="btn btn-secondary btn-flat">Profile</a>
                            </div>
                            <div class="float-right">
                                {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                                    {{ Form::submit(trans('auth.field.sign_out'), [
                                        'class' => 'btn btn-secondary btn-flat'
                                    ]) }}
                                {!! Form::close() !!}
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>