<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Model;

class LogAuth extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Atributos que são atribuíveis a massa.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'username', 'method', 'url', 'ip', 'user_agent', 'success'
    ];

    /**
     * Usuário relacionado ao log.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
