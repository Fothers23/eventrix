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


}
