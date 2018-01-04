@php
    $menu = new \App\Services\Menu();
@endphp

@foreach($menu->filter() as $dividerLabel => $menus)

    {{--  Exibe o divisor, se houver.  --}}
    @if($dividerLabel != 'null')
        <li class="header text-uppercase">{{ trans('menu.'.$dividerLabel) }}</li>
    @endif

    {{--  Percorre os menus.  --}}
    @include('layouts.menu._item', ['menus' => $menus])

@endforeach