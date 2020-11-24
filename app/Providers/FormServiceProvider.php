<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;
use Illuminate\Support\MessageBag;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->input();
        $this->password();
        $this->select();
        $this->error();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Cria um input com HTML default da aplicação.
     */
    private function input()
    {
        Form::macro('inputComponent', function($type, $name, $value, $label, array $options, $errors) {
            
            // Trata os valores necessários.
            $id = str_replace(['[', ']', '_'], ['-', '', '-'], $name);
            $requestValue = str_replace(['[', ']'], ['.', ''], $name);
            $required = !empty($options['required']) ? $options['required'] : false;

            // Trata os atributos do input.
            $options = array_merge($options, [
                'id' => $id,
                'title' => trans($label),
                'class' => 'form-control'
                            . ($errors->has($requestValue) ? ' is-invalid' : '')
                            . (!empty($options['class']) ? " {$options['class']}" : null)
            ]);

            return '<div class="form-group">'
                    . Form::label($id, trans($label).($required ? ' *' : null))
                    . Form::$type($name, old($requestValue) ?: $value, $options)
                    . Form::error($requestValue, $errors)
                    . '</div>';
        });
    }
    
    /**
     * Cria um input password com HTML default da aplicação.
     */
    private function password()
    {
        Form::macro('passwordComponent', function($name, $value, $label, array $options, $errors) {
            
            // Trata os valores necessários.
            $id = str_replace(['[', ']', '_'], ['-', '', '-'], $name);
            $requestValue = str_replace(['[', ']'], ['.', ''], $name);
            $required = !empty($options['required']) ? $options['required'] : false;

            // Trata os atributos do input.
            $options = array_merge($options, [
                'id' => $id,
                'title' => trans($label),
                'class' => 'form-control'
                            . ($errors->has($requestValue) ? ' is-invalid' : '')
                            . (!empty($options['class']) ? " {$options['class']}" : null)
            ]);

            return '<div class="form-group">'
                    . Form::label($id, trans($label).($required ? ' *' : null))
                    . '<div class="input-group">'
                    . Form::input('password', $name, old($requestValue) ?: $value, $options)
                    . '<span class="input-group-addon" data-toggle="password" data-target="#'.$id.'"><i class="fa fa-eye-slash"></i></span>'
                    . '</div>'
                    . Form::error($requestValue, $errors)
                    . '</div>';
        });
    }
    
    /**
     * Cria um select com HTML default da aplicação.
     */
    private function select()
    {
        Form::macro('selectComponent', function($name, $list, $selected, $label, array $options, $errors) {
            
            // Trata os valores necessários.
            $id = str_replace(['[', ']', '_'], ['-', '', '-'], $name);
            $requestValue = str_replace(['[', ']'], ['.', ''], $name);
            $required = !empty($options['required']) ? $options['required'] : false;

            // Trata os atributos do input.
            $options = array_merge($options, [
                'id' => $id,
                'title' => trans($label),
                'class' => 'form-control'
                            . ($errors->has($requestValue) ? ' is-invalid' : '')
                            . (!empty($options['class']) ? " {$options['class']}" : null)
            ]);

            return '<div class="form-group">'
                    . Form::label($id, trans($label).($required ? ' *' : null))
                    . Form::select($name, $list, old($requestValue) ?: $selected, $options)
                    . Form::error($requestValue, $errors)
                    . '</div>';
        });
    }

    /**
     * Cria a mensagem de erro retornada pela validação do formulário.
     */
    private function error()
    {
        Form::macro('error', function($name, $errors) {

            if ($errors->has($name)) {
                return '<div class="invalid-feedback d-block">'.$errors->first($name).'</div>';
            }

            return null;
        });
    }
}
