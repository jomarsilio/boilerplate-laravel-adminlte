{{-- 
    How to use?

    @include("shared.buttons._create", [
        'route' => 'route', // REQUIRED
        'parameters' => [$param1, $param2, $param3],
        'options' => ['attribute' =. 'value'],
        'type' => 'type', // button | null
        'dropdown' => [
            'route' => 'route.name',
            'parameters' => [$param1, $param2, $param3],
            'label' => label',   // label
        ]
    ])
 --}}
@permission($route)

    <div class="btn-group float-right">

        {{-- Botão. --}}
        @if(isset($type) && $type == 'button')
            <button type="button" class="btn btn-primary btn-sm px-3" 
                    @if (isset($options))
                        @foreach ($options as $attr => $value)
                            {{$attr}}="{{$value}}"
                        @endforeach
                    @endif
                >@lang('button.new')</button>
        @else
            {!! link_to_route(
                $route,
                trans('button.new'),
                (isset($parameters) ? $parameters : []),
                (isset($options) ? array_merge($options, ['class' => 'btn btn-primary btn-sm px-3']) : ['class' => 'btn btn-primary btn-sm px-3'])
            ) !!}
        @endif

        {{--  Dropdown  --}}
        @if (!empty($dropdown))
            <button type="button" class="btn btn-primary btn-sm  dropdown-toggle dropdown-toggle-split" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu">
                @foreach ($dropdown as $dropdownItem)

                    @permission($dropdownItem['route'])

                        {!! link_to_route(
                            $dropdownItem['route'],
                            trans($dropdownItem['label']),
                            (isset($dropdownItem['parameters']) ? $dropdownItem['parameters'] : []),
                            [
                                'class' => 'dropdown-item'
                            ]
                        ) !!}

                    @endpermission

                @endforeach
            </div>
        @endif

    </div>

@endpermission