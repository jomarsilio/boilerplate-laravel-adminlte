<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * Atributos que são atribuíveis a massa.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Atributos que devem ser ocultos nos arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Retorna o primeiro nome do usuário.
     *
     * @return string
     */
    public function getFirstNameAttribute()
    {
        // O atributo existe?
        if (!isset($this->attributes['name'])) {
            return null;
        }

        // Explode os espaços do nome e cria um array.
        $name = explode(' ', $this->attributes['name']);

        // Retorna o primeiro nome.
        return title_case(head($name));
    }

    /**
     * Retorna o primeiro e segundo nome do usuário.
     *
     * @return string
     */
    public function getShortNameAttribute()
    {
        // O atributo existe?
        if (!isset($this->attributes['name'])) {
            return null;
        }

        // Explode os espaços do nome e cria um array.
        $name = explode(' ', $this->attributes['name']);

        // O array possui mais de 1 posição?
        if (count($name) > 1) {
            // Retorna o primeiro e segundo nome.
            return title_case(head($name)) . ' ' . title_case($name[1]);
        }

        // Retorna o primeiro nome.
        return title_case(head($name));
    }

    /**
     * Retorna o nome dos papéis associoados a um usuario.
     *
     * @return string
     */
    public function getRoleNameAttribute()
    {
        $roleName = [];

        // Resgata os papéis atribuídos ao usuário.
        $roles = $this->roles()->get();

        // Percorre os papéis e extrai o nome.
        foreach ($roles as $role) {
            $roleName[] = $role->display_name;
        }

        return implode(',', $roleName);
    }
}
