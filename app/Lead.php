<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /*
        Relationship: One to Many
        Return: Collection
    */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

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
    public function leadScores()
    {
        return $this->hasMany(LeadScore::class);
    }

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function userSavedLeads()
    {
        return $this->hasMany(UserSavedLead::class);
    }

}
