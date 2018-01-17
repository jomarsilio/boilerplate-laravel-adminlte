{{-- Left sidebar --}}
<aside class="main-sidebar pt-0">
	<section class="sidebar">

		{{-- User panel --}}
		<div class="user-panel">
			<div class="float-left image">
                <a href="{{ route('user.profile.edit') }}">
                    <i aria-hidden="true" class="fa fa-user-circle-o text-white"></i>
                </a>
			</div>
			<div class="float-left info">
				<p class="text-truncate">{{ auth()->user()->shortName }}</p>
				<small>
					<i class="fa fa-circle text-success mr-1"></i> Online
				</small>
			</div>
		</div>

        {{-- Search form --}}
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        
        {{-- Menu --}}
		<ul class="sidebar-menu" data-widget="tree">
			@include('layouts.menu._divider')
		</ul>
	</section>
</aside>