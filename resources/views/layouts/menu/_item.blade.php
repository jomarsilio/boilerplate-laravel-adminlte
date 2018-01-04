{{--  Menus  --}}

@foreach($menus as $menu)

    <li class="{{ !empty($menu['children']) ? 'treeview' : null }} 
               {{ !empty($menu['route']) && request()->route()->getName() == $menu['route'] ? 'active' : null }}">
       
        <a href="{{ !empty($menu['route']) ? route($menu['route']) : '#' }}">
            
            {{--  Icon  --}}
            <i class="fa fa-{{ !empty($menu['icon']) ? $menu['icon'] : 'circle-o' }}"></i>

            {{--  Label  --}}
            <span>{{ trans('menu.'.$menu['label']) }}</span>

            {{--  Icon treeview  --}}
            @if(!empty($menu['children']))
                <span class="float-right-container">
                    <i class="fa fa-angle-left float-right"></i>
                </span>
            @endif
        </a>

        {{--  Submenus  --}}
        @if(!empty($menu['children']))
            <ul class="treeview-menu">
                {{--  Percorre os menus.  --}}
                @include('layouts.menu._item', ['menus' => $menu['children']])
            </ul>
        @endif
    </li>

@endforeach