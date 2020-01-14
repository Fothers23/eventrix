<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadScore extends Model
{
    //
    protected $fillable = [
        'venue_specs', 'value', 'sector', 'proj_max_capacity', 'proj_exhibition', 'proj_break_outs', 'preferred_month',
        'year_interval', 'proj_participants', 'proj_days', 'proj_rooms'
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
