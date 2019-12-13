<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'name', 'country_code', 'description', 'website_url', 'max_capacity', 'break_out_rooms_total', 'floor_sqm'
    ];

    /*
        Relationship: Many to Many
        Return: Collection
    */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /*
       Relationship: Many to One
       Return: Collection
   */
    public function rooms()
    {
        return $this->hasMany(Room::class)->with('capRoomStyles');
    }

    /*
       Relationship: One to Many
       Return: Collection
   */
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
