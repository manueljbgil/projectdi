<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backyard extends Model
{
    protected $fillable = [
        'name','description','image', 'user_id'
    ];

    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
