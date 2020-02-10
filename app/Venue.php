<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'name', 'country_code', 'description', 'website_url', 'max_capacity','address',
        'break_out_rooms_total', 'floor_sqm', 'city', 'post_code', 'research_notes', 'user_id', 'phone_number',
        'email'
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
       Relationship: Many to One
       Return: Collection
   */
    public function rooms()
    {
        return $this->hasMany(Room::class)->with('style');
    }

    /*
       Relationship: One to Many
       Return: Collection
   */
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function numOfRooms()
    {
        return $this->rooms()->count();
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
