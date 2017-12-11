@extends($layout)

@section('title', trans('menu.update_user_account'))

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
    {!! Form::open(['route' => ['admin.user.update', $user->id], 'method' => 'put']) !!}

        <div class="box box-primary">

            <div class="box-body px-3">
                @include('admin.user._form', ['user' => $user])
            </div>
            
            <div class="box-footer px-3">
                {{ Form::submit(trans('button.save'), [
                    'class' => 'btn btn-primary float-right',
                ]) }}
            </div>

        </div>

    {!! Form::close() !!}
@endsection