<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = [
        'name', 'plantation_id','backyard_id', 'user_id'
    ];

    public function plantation(){
        return $this->belongsTo('App\Plantation');
    }

    public function backyard(){
        return $this->belongsTo('App\Backyard');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
