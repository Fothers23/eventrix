<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function hasAnyRole($roles)
    {
      if ($this->roles()->whereIn(‘name’, $roles)->first())
      {
        return true;
      }
      return false;
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
      if ($this->roles()->where(‘name’, $role)->first())
      {
        return true;
      }
      return false;
    }
}
