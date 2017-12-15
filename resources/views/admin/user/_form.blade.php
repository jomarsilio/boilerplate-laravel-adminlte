<div class="form-group">
    {{ Form::label('user-name', trans('user.field.name')) }}

    {{ Form::text('user[name]', old('user.name') ?: (!empty($user) ? $user->name : null), [
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

    {{ Form::email('user[email]', old('user.email') ?: (!empty($user) ? $user->email : null), [
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

    {{ Form::text('user[username]', old('user.username') ?: (!empty($user) ? $user->username : null), [
        'class' => 'form-control' . ($errors->has('user.username') ? ' is-invalid' : ''),
        'id' => 'user-username',
        'title' => trans('user.field.username'),
        'maxlength' => config('validation.user.username.max'),
        'required' => (!empty($user) ? false : true),
        'disabled' => (!empty($user) ? true : false),
    ]) }}

    @if ($errors->has('user.username'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('user.username') }}
        </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('user-password', trans('user.field.password')) }}

    {{ Form::password('user[password]', [
        'class' => 'form-control' . ($errors->has('user.password') ? ' is-invalid' : ''),
        'id' => 'user-password',
        'title' => trans('user.field.password'),
        'maxlength' => config('validation.user.password.max'),
        'required' => (!empty($user) ? false : true),
    ]) }}

    @if ($errors->has('user.password'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('user.password') }}
        </div>
    @endif
</div>
   
<div class="form-group">
    {{ Form::label('role-id', trans('user.field.role')) }}

    {{ Form::select('roleId', map_with_keys($roles, 'id', 'display_name'), old('roleId') ?: (!empty($user) ? $user->roleId : null), [
        'class' => 'form-control',
        'id' => 'role-id',
        'title' => trans('user.field.role'),
        'placeholder' => trans('user.text.select_user_role'),
        'required' => true,
    ]) }}

    @if ($errors->has('roleId'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('roleId') }}
        </div>
    @endif

</div>
   
<div class="form-group">
    {{ Form::label('user-active', trans('user.field.is_active')) }}

    <div class="material-switch">
        {{ Form::checkbox('user[active]', 1, old('user.active') ?: (!empty($user) ? $user->active : true), [
            'id' => 'user-active',
            'title' => trans('user.field.active'),
        ]) }}
        <label for="user-active" class="bg-primary"></label>
    </div>
</div>