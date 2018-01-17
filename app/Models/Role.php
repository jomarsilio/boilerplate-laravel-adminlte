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
            config('entrust.user_foreign_key'),
            config('entrust.role_foreign_key')
        );
    }

    /**
     * Sobrescrito o método que retorna as permissões do usuário pois não estava salvando em Cache.
     *
     * @return Collection
     */
    public function cachedPermissions()
    {
        if (config('cache.default') == 'array') {
            $rolePrimaryKey = $this->primaryKey;
            $cacheKey = 'entrust_permissions_for_role_'.$this->$rolePrimaryKey;

            if (!isset($this->$cacheKey)) {
                $this->$cacheKey = $this->perms()->get();
            }
            
            return $this->$cacheKey;
        } else {
            return parent::cachedPermissions();
        }
    }
}
