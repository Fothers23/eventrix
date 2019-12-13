<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SicSection extends Model
{
    protected $fillable = [
        'name', 'code', 'image'
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function sicDivisions() 
    {
        return $this->hasMay(SicDivision::class);
    }
}
