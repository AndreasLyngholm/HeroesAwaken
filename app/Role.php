<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $fillable = ['expire_at'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permSlug)
    {
        $permission = Permission::where('slug', $permSlug)->first();
        return $this->permissions()->get()->contains($permission);
    }
}
