@extends($layout)

@section('title', trans('menu.user_accounts'))

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
                'name' => trans('menu.user_accounts'),
                'class' => 'active',
                'route' => 'admin.user.index',
            ]
        ]
    ])
@endsection

@section('content')

    <div class="box border-top-0">

        <div class="box-header">
            @include('shared.buttons._create', ['route' => 'admin.user.create'])

            @include('shared._search', [
                'dataSearch' => 'table',
                'target' => '#user-index'
            ])
        </div>

        <div class="box-body p-0" id="user-index">

            @component('shared.components._table')

                @slot('thead')
                    <tr>
                        <th scope="col">@lang('user.field.name')</th>
                        <th scope="col">@lang('user.field.username')</th>
                        <th scope="col" class="d-none d-md-table-cell">@lang('user.field.role')</th>
                        <th scope="col" class="d-none d-md-table-cell">@lang('user.field.email')</th>
                        <th scope="col" class="d-none d-md-table-cell">@lang('user.field.last_access')</th>
                        <th scope="col" class="text-center">@lang('user.field.active')</th>

                        @permission('admin.user.edit')
                            <th scope="col">&nbsp;</th>
                        @endpermission
                    </tr>
                @endslot

                @foreach($users as $user)
                    <tr class="{{ $user->active ? null : 'text-muted' }}">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td class="d-none d-md-table-cell">{{ $user->roles->isNotEmpty() ? $user->roles->first()->display_name : '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $user->email ?: '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $user->accessed_at ?: '-' }}</td>
                        <td class="text-center">
                            <i class="fa fa-eye{{ $user->active ? null : '-slash' }}"></i>
                        </td>
                        @permission('admin.user.edit')
                            <td class="text-right pr-3">
                                <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}" class="{{ $user->active ? 'text-dark' : 'text-muted' }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        @endpermission
                    </tr>
                @endforeach

            @endcomponent
        </div>

        @if(count($users) > 15)
            <div class="box-footer">
                @include('shared.buttons._create', ['route' => 'admin.user.create'])
            </div>
        @endif
    </div>

@endsection