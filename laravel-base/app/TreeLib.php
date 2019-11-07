<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreeLib extends Model
{
    protected $fillable = [
        'image', 'tree_id'
    ];

    public function tree(){
        return $this->belongsTo('App\Tree');
    }
}
