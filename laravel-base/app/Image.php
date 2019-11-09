<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path', 'library_id'
    ];

    public function library(){
        return $this->belongsTo('App\Library');
    }

}
