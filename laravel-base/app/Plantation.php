<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantation extends Model
{
    protected $fillable = [
        'name','planted_at','description', 'backyard_id', 'type_id'
    ];

    public function backyard(){
        return $this->belongsTo('App\Backyard');
    }
    
    public function type(){
        return $this->belongsTo('App\Type');
    }
}
