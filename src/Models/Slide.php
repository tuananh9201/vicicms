<?php

namespace VICITECH\ViciCMS\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table='slide';
    protected $fillable=['image','caption','shortDesc'];
}
