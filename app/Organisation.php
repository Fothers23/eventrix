<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = [
        'name', 'description', 'member_total', 'year_founded', 'website_url','sic_division_id','address','city','postcode',
        'contact_name','contact_phone','contact_email','research_notes', 'user_id'
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function sicDivision()
    {
        return $this->belongsTo(SicDivision::class);
    }

    public function numOfEvents()
    {
        return $this->events()->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($organisation) { // before delete() method call this
            $organisation->events()->each(function($event) {
                $event->delete(); //direct deletion
            });
        });
    }
}
