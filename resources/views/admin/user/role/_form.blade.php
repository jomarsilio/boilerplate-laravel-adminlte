<div class="form-group">
    {{ Form::label('role-display-name', trans('role.field.name')) }}

    {{ Form::text('role[displayName]', old('role.displayName') ?: (!empty($role) ? $role->displayName : null), [
        'class' => 'form-control' . ($errors->has('role.displayName') ? ' is-invalid' : ''),
        'id' => 'role-display-name',
        'title' => trans('role.field.name'),
        'maxlength' => config('validation.role.displayName.max'),
        'autofocus' => true,
    ]) }}
    
    @if ($errors->has('role.displayName'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('role.displayName') }}
        </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('role-name', trans('role.field.short_name')) }}

    {{ Form::text('role[name]', old('role.name') ?: (!empty($role) ? $role->name : null), [
        'class' => 'form-control' . ($errors->has('role.name') ? ' is-invalid' : ''),
        'id' => 'role-name',
        'title' => trans('role.field.short_name'),
        'maxlength' => config('validation.role.name.max'),
        'required' => (!empty($role) ? false : true),
        'disabled' => (!empty($role) ? true : false),
    ]) }}

    @if ($errors->has('role.name'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('role.name') }}
        </div>
    @endif
</div>

<div class="form-group">
    {{ Form::label('role-description', trans('role.field.description')) }}

    {{ Form::text('role[description]', old('role.description') ?: (!empty($role) ? $role->description : null), [
        'class' => 'form-control' . ($errors->has('role.description') ? ' is-invalid' : ''),
        'id' => 'role-description',
        'title' => trans('role.field.description'),
        'maxlength' => config('validation.role.description.max'),
    ]) }}

    @if ($errors->has('role.description'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('role.description') }}
        </div>
    @endif
</div>