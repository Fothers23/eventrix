<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SicDivision extends Model
{
    //
    protected $fillable = [
      
        'name', 'code','sic_section_id'

    ];

    public function sicSection()
    {
        return $this->belongsTo(SicSection::class);
    }

}
