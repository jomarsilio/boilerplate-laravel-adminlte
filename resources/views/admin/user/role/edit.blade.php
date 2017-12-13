@extends($layout)

@section('title', trans('menu.update_user_role'))

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
    {!! Form::open(['route' => ['admin.user.role.update', 'id' => $role->id], 'method' => 'put']) !!}

        <div class="box box-primary">

            <div class="box-body px-3">
                @include('admin.user.role._form', ['role' => $role])
            </div>
            
            <div class="box-footer px-3">
                {{ Form::submit(trans('button.save'), [
                    'class' => 'btn btn-primary float-right',
                ]) }}
            </div>

        </div>

    {!! Form::close() !!}
@endsection