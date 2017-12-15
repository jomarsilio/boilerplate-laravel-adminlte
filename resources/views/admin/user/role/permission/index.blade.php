@extends($layout)

@section('title', trans('menu.role_permissions', ['name' => $role->displayName]))

@section('breadcrumb')
    @include('shared._breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => trans('menu.application_settings'),
                'class' => '',
            ],
            [
                'name' => trans('menu.users'),
                'class' => '',
            ],
            [
                'name' => trans('menu.user_roles'),
                'class' => '',
                'route' => 'admin.user.role.index',
            ]
        ]
    ])
@endsection


@section('content')

    <div class="box border-top-0">

        <div class="box-header">
            @include('shared._search', [
                'dataSearch' => 'table',
                'target' => '#permission-index'
            ])
        </div>

        <div class="box-body p-0" id="permission-index">

            @component('shared.components._table')

                @slot('thead')
                    <tr>
                        <th scope="col">@lang('permission.field.action')</th>
                        <th scope="col" class="{{ auth()->user()->can('admin.user.role.permission.update') ? null : 'text-center'}}">
                            @lang('permission.field.permission')
                        </th>
                    </tr>
                @endslot

                @foreach(map_permissions_to_groups($permissions) as $key => $group)

                    <tr class="table-secondary">
                        <td colspan="2"><b>{{ trans('permission.group.'.$key) }}</b></td>
                    <tr>

                    @foreach($group as $permission)
                        <tr>
                            <td>@lang('permission.route.'.$permission->name)</td>

                            <td class="{{ auth()->user()->can('admin.user.role.permission.update') ? null : 'text-center'}}">
                                @if (auth()->user()->can('admin.user.role.permission.update'))
                                    {!! Form::open(['route' => ['admin.user.role.permission.update', $role, $permission], 'method' => 'put']) !!}
                                        <div class="material-switch">
                                            {{ Form::checkbox('active', 1, $role->hasPermission($permission->name), [
                                                'id' => 'permission-'.$permission->id,
                                                'data-ajax-form-submit' => ''
                                            ]) }}
                                            <label for="permission-{{ $permission->id }}" class="bg-primary"></label>
                                        </div>
                                    {!! Form::close() !!}
                                @else
                                    <i class="fa fa-eye{{ $role->hasPermission($permission->name) ? null : '-slash text-muted' }}"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach

            @endcomponent
        </div>
    </div>

@endsection