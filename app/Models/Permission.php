<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    /**
     * Retorna o nome da permissão.
     *
     * @return string
     */
    public function getDisplayNameAttribute()
    {
        // O atributo existe?
        if (!isset($this->attributes['display_name'])) {
            return null;
        }


        return $this->attributes['display_name'];
    }
}
