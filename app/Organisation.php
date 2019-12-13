<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = [
        'name', 'description', 'member_size', 'year_founded', 'website_url', 'image'
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
