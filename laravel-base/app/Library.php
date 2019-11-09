<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = [
        'name', 'plantation_id'
    ];

    public function plantation(){
        return $this->belongsTo('App\Plantation');
    }
    
}
