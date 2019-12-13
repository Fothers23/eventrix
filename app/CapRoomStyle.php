
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapRoomStyle extends Model
{
    protected $fillable = [
        'capacity', 
    ];

    protected $appends = ['style_name'];

     /*
        Relationship: One to Many
        Return: Collection
    */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    /*
        Relationship: Many to Many
        Return: Collection
    */
    public function eventInstances() 
    {
        return $this->belongsToMany(EventInstance::class);
    }
}
