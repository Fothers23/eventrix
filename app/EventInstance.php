<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInstance extends Model
{
      protected $fillable = [
        'name', 'participants', 'happened'
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function event() 
    {
        return $this->belongsTo(Event::class);
    }

    /*
        Relationship: Many to Many
        Return: Collection
    */
    public function capRoomStyles() 
    {
        return $this->belongsToMany(CapRoomStyle::class);
    }

    /*
        Relationship: Many to Many
        Return: Collection
    */
    public function sicDivisions() 
    {
        return $this->belongsToMany(SicDivision::class);
    }

    /*
        Relationship: Many to Many
        Return: Collection
    */
    public function leads() 
    {
        return $this->hasMany(Lead::class);
    }
}
