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
                <div class="form-group">
                    {{ Form::label('user-name', trans('user.field.name')) }}

                    {{ Form::text('user[name]', old('user.name') ?: $user->name, [
                        'class' => 'form-control' . ($errors->has('user.name') ? ' is-invalid' : ''),
                        'id' => 'user-name',
                        'title' => trans('user.field.name'),
                        'maxlength' => config('validation.user.name.max'),
                        'required' => true,
                        'autofocus' => true,
                    ]) }}

                    @if ($errors->has('user.name'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('user.name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('user-email', trans('user.field.email')) }}

                    {{ Form::email('user[email]', old('user.email') ?: $user->email, [
                        'class' => 'form-control' . ($errors->has('user.email') ? ' is-invalid' : ''),
                        'id' => 'user-email',
                        'title' => trans('user.field.email'),
                        'maxlength' => config('validation.user.email.max'),
                    ]) }}
                    
                    @if ($errors->has('user.email'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('user.email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('user-username', trans('user.field.username')) }}

                    {{ Form::text('username', $user->username, [
                        'class' => 'form-control',
                        'id' => 'user-username',
                        'title' => trans('user.field.username'),
                        'disabled' => true,
                    ]) }}
                </div>

                <div class="form-group">
                    {{ Form::label('user-current-password', trans('user.field.current_password')) }}

                    <div class="input-group">
                        {{ Form::password('password', [
                            'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                            'id' => 'user-current-password',
                            'title' => trans('user.field.current_password'),
                            'maxlength' => config('validation.user.password.max'),
                            'required' => true,
                        ]) }}

                        <span class="input-group-addon" data-toggle="password" data-target="#user-current-password"><i class="fa fa-eye-slash"></i></span>
                    </div>
                
                    @if ($errors->has('password'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>


                <div class="card mt-4">
                    <div class="card-header">
                        @lang('user.text.to_change_password')
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            {{ Form::label('new-password', trans('user.field.new_password')) }}

                            <div class="input-group">
                                {{ Form::password('new_password', [
                                    'class' => 'form-control' . ($errors->has('new_password') ? ' is-invalid' : ''),
                                    'id' => 'new-password',
                                    'title' => trans('user.field.new_password'),
                                    'maxlength' => config('validation.user.password.max'),
                                ]) }}

                                <span class="input-group-addon" data-toggle="password" data-target="#new-password"><i class="fa fa-eye-slash"></i></span>
                            </div>

                            @if ($errors->has('new_password'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('new_password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('confirm-password', trans('user.field.confirm_password')) }}

                            <div class="input-group">
                                {{ Form::password('new_password_confirmation', [
                                    'class' => 'form-control' . ($errors->has('new_password_confirmation') ? ' is-invalid' : ''),
                                    'id' => 'confirm-password',
                                    'title' => trans('user.field.confirm_password'),
                                    'maxlength' => config('validation.user.password.max'),
                                ]) }}

                                <span class="input-group-addon" data-toggle="password" data-target="#confirm-password"><i class="fa fa-eye-slash"></i></span>
                            </div>
                            
                            @if ($errors->has('new_password_confirmation'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('new_password_confirmation') }}
                                </div>
                            @endif
                        </div>

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