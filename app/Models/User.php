<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * Atributos que são atribuíveis a massa.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'active', 'accessed_at'
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'accessed_at'
    ];

    /**
     * Logs de autenticação.
     */
    public function logAuths()
    {
        return $this->hasMany('App\Models\Log\LogAuth')->orderBy('created_at', 'desc');
    }

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
     * Converte o formato da data ao resgatar o atributo.
     */
    public function getAccessedAtAttribute()
    {
        if (!empty($this->attributes['accessed_at'])) {
            // Converte para o formato d/m/Y H:i:s.
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['accessed_at'])->format('d/m/Y H:i:s');
        }

        return null;
    }
}
