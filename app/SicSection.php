<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SicSection extends Model
{
    protected $fillable = [
        'name', 'code', 
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function sicDivisions() 
    {
        return $this->hasMany(SicDivision::class);
    }
}
