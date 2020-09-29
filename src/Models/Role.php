<?php

namespace Michael\Roles\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'pgsql';
    protected $fillable = ['name'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_roles', 'role_id', 'user_id');
    }
}
