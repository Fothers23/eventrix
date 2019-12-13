<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function eventType() 
    {
        return $this->belongsTo(EventType::class);
    }

     /*
        Relationship: One to Many
        Return: Collection
    */
    public function organisation() 
    {
        return $this->belongsTo(Organisation::class);
    }

     /*
        Relationship: One to Many
        Return: Collection
    */
    public function eventInstances() 
    {
        return $this->hasMany(EventInstance::class);
    }

}
