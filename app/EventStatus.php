<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventStatus extends Model
{

    protected $fillable = [
        'status',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
