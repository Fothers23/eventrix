<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
     protected $fillable = [
        'name',
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
