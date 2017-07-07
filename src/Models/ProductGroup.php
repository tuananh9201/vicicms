<?php

namespace VICITECH\ViciCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductGroup extends Model
{

    use Sluggable;
    protected $table ='productgroup';
    protected $fillable=['name', 'slug'];
     public function relProvider()
    {
        return $this-> hasMany('VICITECH\ViciCMS\Models\Provider','productgroup_id','id');
    }
     public function relProduct()
    {
        return $this-> hasMany('VICITECH\ViciCMS\Models\Product','productgroup_id','id');
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
