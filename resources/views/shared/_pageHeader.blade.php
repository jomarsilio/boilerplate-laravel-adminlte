{{-- Content Header (Page header) --}}
<section class="content-header">

    <h1>
        @yield('title')
        {{--  <small>Control panel</small>  --}}
    </h1>

    {{-- Breadcrumb --}}
    <ol class="breadcrumb d-none d-md-flex">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i> @lang('menu.home')</a>
        </li>
        @yield('breadcrumb')
    </ol>

</section>