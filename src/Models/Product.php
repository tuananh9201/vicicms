<?php

namespace VICITECH\ViciCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
     use Sluggable;
     protected $table='product';
     protected $fillable=['productgroup_id', 'provider_id', 'name', 'slug', 'description', 'content', 'unitprice', 'image','baohanh'];
       public function relProductGroup()
    {
        return $this->belongsTo('VICITECH\ViciCMS\Models\ProductGroup', 'productgroup_id','id');
    }
      public function relProvider()
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
