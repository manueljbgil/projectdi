<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{

    protected $fillable = [
        'name','planted_at','description', 'backyard_id'
    ];

    public function backyard(){
        return $this->belongsTo('App\Backyard');
    }
}
