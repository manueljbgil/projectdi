<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name','planted_at','description', 'backyard_id'
    ];

    public function backyard(){
        return $this->belongsTo('App\Backyard');
    }
}
