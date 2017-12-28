{!!
    Form::inputComponent(
        'text',
        'role[displayName]',
        !empty($role) ? $role->displayName : null,
        'role.field.name',
        [
            'maxlength' => config('validation.role.displayName.max'),
            'autofocus' => true,
            'required' => true,
        ],
        $errors
    )
!!}

{!!
    Form::inputComponent(
        'text',
        'role[name]',
        !empty($role) ? $role->name : null,
        'role.field.short_name',
        [
            'maxlength' => config('validation.role.name.max'),
            'required' => (!empty($role) ? false : true),
            'disabled' => (!empty($role) ? true : false),
        ],
        $errors
    )
!!}

{!!
    Form::inputComponent(
        'text',
        'role[description]',
        !empty($role) ? $role->description : null,
        'role.field.description',
        [
            'maxlength' => config('validation.role.description.max'),
        ],
        $errors
    )
!!}