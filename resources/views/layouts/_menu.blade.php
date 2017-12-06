{{-- Sidebar --}}
<aside class="main-sidebar pt-0">
    <section class="sidebar">
      
        {{-- Sidebar user panel --}}
        <div class="user-panel">
            <div class="float-left image">
                <i aria-hidden="true" class="fa fa-user-circle-o text-white"></i>
            </div>
            <div class="float-left info">
                <p class="text-truncate">{{ auth()->user()->shortName }}</p>
                <small>
                    <i class="fa fa-circle text-success mr-1"></i> Online
                </small>
            </div>
        </div>

        {{-- Search form --}}
        {{--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>  --}}

        {{-- Sidebar menu --}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="active">
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                    <span>@lang('menu.home')</span>
                </a>
            </li>

            {{-- Network settings --}}
            <li class="header text-uppercase">@lang('menu.network_settings')</li>
            <li>
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>@lang('menu.hardware')</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-building"></i>
                    <span>@lang('menu.condominiums')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-usb"></i>
                    <span>@lang('menu.optical_fiber')</span>
                    <span class="float-right-container">
                        <i class="fa fa-angle-left float-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i>@lang('menu.points_of_presence')
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i>@lang('menu.concentrators')
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i>@lang('menu.olts')
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i>@lang('menu.splitters')
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i>@lang('menu.access_points')
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Apllication settings --}}
            <li class="header text-uppercase">@lang('menu.application_settings')</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('menu.users')</span>
                    <span class="float-right-container">
                        <i class="fa fa-angle-left float-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"></i>@lang('menu.user_accounts')
                        </a>
                    </li>
                    {{--  @permission('admin.user.role.index')  --}}
                        <li>
                            <a href="{{ route('admin.user.role.index') }}">
                                <i class="fa fa-circle-o"></i>@lang('menu.user_roles')
                            </a>
                        </li>
                    {{--  @endpermission  --}}
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Exemplo menu multilevel</span>
                    <span class="float-right-container">
                        <i class="fa fa-angle-left float-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="float-right-container">
                                <i class="fa fa-angle-left float-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="float-right-container">
                                        <i class="fa fa-angle-left float-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
    
</ul>

    </section>
  </aside>