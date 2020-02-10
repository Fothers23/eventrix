<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'max_height', 'total_area', 'dimensions', 'capacity','venue_id','style_id'
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

     /*
        Relationship: One to Many
        Return: Collection
    */
    public function style()
    {
        return $this->belongsTo(Style::class);
    }
}
