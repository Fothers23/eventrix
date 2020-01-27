<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'event_type_id', 'organisation_id', 'participants', 'research_notes',
        'start_date', 'end_date', 'event_status_id', 'venue_id', 'user_id', 'location'
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

     /*
        Relationship: One to Many
        Return: Collection
    */
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

     /*
        Relationship: One to Many
        Return: Collection
    */
    public function eventStatus()
    {
        return $this->belongsTo(EventStatus::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
