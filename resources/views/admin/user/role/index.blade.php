@extends($layout)

@section('title', 'Grupo de usuários')

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
    olá mundo!
@endsection