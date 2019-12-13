<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSavedLead extends Model
{
    protected $fillable = [
        'saved',
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
       Relationship: One to Many
       Return: Collection
   */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
