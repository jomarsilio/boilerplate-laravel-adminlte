@extends($layout)

@section('title', trans('user.profile'))

@section('breadcrumb')
    @include('shared._breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => trans('user.profile'),
                'class' => 'active',
            ]
        ]
    ])
@endsection

@section('content')

    {!! Form::open(['route' => 'user.profile.update', 'method' => 'put']) !!}

        <div class="box box-primary">

            <div class="box-body px-3">

                {!!
                    Form::inputComponent(
                        'text',
                        'user[name]',
                        $user->name,
                        'user.field.name',
                        [
                            'maxlength' => config('validation.user.name.max'),
                            'required' => true,
                            'autofocus' => true,
                        ],
                        $errors        
                    )
                !!}

                {!!
                    Form::inputComponent(
                        'email',
                        'user[email]',
                        $user->email,
                        'user.field.email',
                        [
                            'maxlength' => config('validation.user.email.max'),
                        ],
                        $errors        
                    )
                !!}

                {!!
                    Form::inputComponent(
                        'text',
                        'username',
                        $user->username,
                        'user.field.username',
                        [
                            'disabled' => true,
                        ],
                        $errors        
                    )
                !!}

                {!!
                    Form::passwordComponent(
                        'password',
                        null,
                        'user.field.current_password',
                        [
                            'maxlength' => config('validation.user.password.max'),
                            'required' => true,
                        ],
                        $errors        
                    )
                !!}


                <div class="card mt-4">
                    <div class="card-header">
                        @lang('user.text.to_change_password')
                    </div>
                    <div class="card-body">

                        {!!
                            Form::passwordComponent(
                                'new_password',
                                null,
                                'user.field.new_password',
                                [
                                    'maxlength' => config('validation.user.password.max'),
                                ],
                                $errors        
                            )
                        !!}

                        {!!
                            Form::passwordComponent(
                                'new_password_confirmation',
                                null,
                                'user.field.confirm_password',
                                [
                                    'maxlength' => config('validation.user.password.max'),
                                ],
                                $errors        
                            )
                        !!}

                    </div>
                </div>
            </div>
            
            <div class="box-footer px-3">
                {{ Form::submit(trans('button.save'), [
                    'class' => 'btn btn-primary float-right',
                ]) }}
            </div>

        </div>

    {!! Form::close() !!}
@endsection