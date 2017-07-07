<?php

namespace VICITECH\ViciCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Provider extends Model
{
    use Sluggable;
     protected $table='provider';
     protected $fillable=['name', 'slug','productgroup_id'];
       public function relProducGroup()
    {
        return $this->belongsTo('VICITECH\ViciCMS\Models\Provider', 'provider_id','id');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
}
