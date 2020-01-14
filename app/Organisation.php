<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = [
        'name', 'description', 'member_total', 'year_founded', 'website_url','sic_division_id','city','postcode','contact_name','contact_phone','contact_email','research_notes'
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
