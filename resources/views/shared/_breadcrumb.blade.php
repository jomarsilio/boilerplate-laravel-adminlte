{{-- 
    How to use?
    
    @include("shared._breadcrumb", [
        'name'         => 'name', // REQUIRED
        'class'       => 'active' or null, // REQUIRED
        'route'       => 'text',
    ])
 --}}

{{-- Percorre o array de breadcrumbs. --}}
@foreach($breadcrumbs as $breadcrumb)
    <li class="breadcrumb-item {{ $breadcrumb['class'] }} {{ empty($breadcrumb['route']) ? 'text-muted' : null }}">

        {{--  Possui rota definida?  --}}
        @if (!empty($breadcrumb['route']))
          <a href="{{ route($breadcrumb['route']) }}">
        @endif

        {{--  Nome do item.  --}}
        {{ $breadcrumb['name'] }}

        {{--  Possui rota definida?  --}}
        @if (!empty($breadcrumb['route']))
          </a>
        @endif
        
    </li>
@endforeach