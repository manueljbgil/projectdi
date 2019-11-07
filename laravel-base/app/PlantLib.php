<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantLib extends Model
{
    protected $fillable = [
        'image', 'plant_id'
    ];

    public function plant(){
        return $this->belongsTo('App\Plant');
    }
}
