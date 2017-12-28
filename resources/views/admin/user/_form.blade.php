{!!
    Form::inputComponent(
        'text',
        'user[name]',
        (!empty($user) ? $user->name : null),
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
        (!empty($user) ? $user->email : null),
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
        'user[username]',
        (!empty($user) ? $user->username : null),
        'user.field.username',
        [
            'maxlength' => config('validation.user.username.max'),
            'required' => (!empty($user) ? false : true),
            'disabled' => (!empty($user) ? true : false),
        ],
        $errors        
    )
!!}

{!!
    Form::passwordComponent(
        'user[password]',
        null,
        'user.field.password',
        [
            'maxlength' => config('validation.user.password.max'),
            'required' => (!empty($user) ? false : true),
        ],
        $errors        
    )
!!}

{!!
    Form::selectComponent(
        'roleId',
        map_with_keys($roles, 'id', 'display_name'),
        !empty($user) ? $user->roleId : null,
        'user.field.role',
        [
            'placeholder' => trans('user.text.select_user_role'),
            'required' => true,
        ],
        $errors        
    )
!!}
   
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