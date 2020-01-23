<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function venues()
    {
        return $this->hasMany(Venue::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function organisations()
    {
        return $this->hasMany(Organisation::class);
    }

    /*
        Relationship: Many to Many
        Return: Collection
    */
    public function userSavedLeads()
    {
        return $this->hasMany(UserSavedLead::class);
    }

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasAnyRole($roles)
    {
        return $this->roles_id == $roles ? true : false;
    }

    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return $this->roles_id == $role ? true : false;
    }

    public function isUser()
    {
        return $this->hasRole(1);
    }

    public function isAdmin()
    {
        return $this->hasRole(2);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole(3);
    }

}
