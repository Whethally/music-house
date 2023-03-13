<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function hasRole($role)
    {
        return $this->name === $role;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission);
    }

    public function givePermissionTo($permission)
    {
        $this->permissions()->save($permission);
    }

    public function revokePermissionTo($permission)
    {
        $this->permissions()->detach($permission);
    }

    public function syncPermissions($permissions)
    {
        $this->permissions()->sync($permissions);
    }

    public function hasAnyPermission($permissions)
    {
        return $this->permissions->contains('name', $permissions);
    }

    public function hasAllPermissions($permissions)
    {
        return $permissions->every(function ($permission) {
            return $this->hasPermission($permission);
        });
    }
}
