@extends($layout)

@section('title', trans('menu.user_roles'))

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
                'class' => 'active',
                'route' => 'admin.user.role.index',
            ]
        ]
    ])
@endsection


@section('content')

    <div class="box border-top-0">

        <div class="box-header">
            @include('shared.buttons._create', ['route' => 'admin.user.role.create'])

            @include('shared._search', [
                'dataSearch' => 'table',
                'target' => '#role-index'
            ])
        </div>

        <div class="box-body p-0" id="role-index">

            @component('shared.components._table')

                @slot('theadClass', 'thead-light')

                @slot('thead')
                    <tr>
                        <th scope="col">
                            @lang('role.field.name')
                            <i class="fa fa-question-circle ml-1" data-toggle="tooltip" data-placement="top" title="@lang('role.text.role_definition')"></i>
                        </th>
                        <th scope="col">@lang('role.field.description')</th>
                        <th scope="col" class="d-none d-md-table-cell">@lang('role.field.short_name')</th>
                        <th scope="col" class="d-none d-md-table-cell text-center">@lang('role.field.users')</th>
                        
                        @permission('admin.user.role.edit')
                            <th scope="col">&nbsp;</th>
                        @endpermission
                    </tr>
                @endslot

                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td class="d-none d-md-table-cell">{{ $role->name }}</td>
                        <td class="d-none d-md-table-cell text-center">{{ $role->users()->count() }}</td>

                        @permission('admin.user.role.edit')
                            <td class="text-right pr-3">
                                <a href="{{ route('admin.user.role.edit', ['role' => $role->id]) }}" class="text-dark">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        @endpermission
                    </tr>
                @endforeach

            @endcomponent
        </div>

        @if(count($roles) > 15)
            <div class="box-footer">
                @include('shared.buttons._create', ['route' => 'admin.user.role.create'])
            </div>
        @endif
    </div>

@endsection