<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = [
        'name',
    ];

    /*
       Relationship: One to Many
       Return: Collection
   */
    public function capRoomStyle()
    {
        return $this->hasMany(CapRoomStyle::class);
    }
}
