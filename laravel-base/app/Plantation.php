<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantation extends Model
{
    protected $fillable = [
        'name','planted_at','description', 'backyard_id', 'type_id','user_id'
    ];

    public function backyard(){
        return $this->belongsTo('App\Backyard');
    }
    
    public function type(){
        return $this->belongsTo('App\Type');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
