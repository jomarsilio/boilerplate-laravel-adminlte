@extends($layout)

@section('content')

<div class="container login-box">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="login-logo d-block d-sm-none">
                <img src="{{ asset('assets/images/logo.png') }}" class="mr-1">
                <small>{{ config('app.name', 'lARAVEL') }}</small>
            </div>

            <div class="card-group">

                <div class="card p-3">
                    <div class="card-body">
                        <h1 class="card-title d-none d-sm-block">@lang('auth.field.sign_in')</h1>
                        <p class="card-text text-muted">@lang('auth.field.sign_in_description')</p>

                        {!! Form::open(['route' => 'login', 'method' => 'post']) !!}

                            <div class="form-group">
                            
                                <div class="input-group">
                                    
                                    <span class="input-group-addon {{ $errors->has('username') ? 'border border-right-0 border-danger' : '' }}">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    {{ Form::text('username', old('username'), [
                                        'class'              => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''),
                                        'id'                 => 'username',
                                        'required'           => true,
                                        'autofocus'          => true,
                                        'placeholder'        => trans('user.field.username'),
                                        'title'              => trans('user.field.username'),
                                    ]) }}
                                
                                </div>

                                @if ($errors->has('username'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon {{ $errors->has('password') ? 'border border-right-0 border-danger' : '' }}">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                    {{ Form::password('password', [
                                        'value'              => old('password'),
                                        'class'              => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                                        'id'                 => 'password',
                                        'required'           => 'required',
                                        'placeholder'        => trans('user.field.password'),
                                        'title'              => trans('user.field.password'),
                                    ]) }}
                                
                                </div>

                                @if ($errors->has('password'))
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            {{ Form::submit(trans('button.sign_in'), [
                                'class' => 'btn btn-primary d-none d-sm-block'
                            ]) }}

                            {{ Form::submit(trans('button.sign_in'), [
                                'class' => 'btn btn-primary btn-block d-block d-sm-none'
                            ]) }}
                        
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="card text-white bg-light-blue-active py-5 d-none d-sm-block">
                    <div class="card-body text-center">
                        <div>
                            <h2 class="card-title my-4">
                                <img src="{{ asset('assets/images/logo-white.png') }}" class="mr-1">
                                <small>{{ config('app.name', 'lARAVEL') }}</small>
                            </h2>

                            <p class="card-text h5">@lang('app.description')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
