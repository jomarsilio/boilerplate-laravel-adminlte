<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    /**
     * Atributos que são atribuíveis a massa.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    /**
     * Many-to-Many relations with the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            config('auth.providers.users.model'),
            config('entrust.role_user_table'),
            config('entrust.role_foreign_key'),
            config('entrust.user_foreign_key')
        );
    }
}
