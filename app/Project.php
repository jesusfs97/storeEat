<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{   
    protected $table = 'products';
    protected $fillable = ['name', 'descripcion', 'price' ];
    // public function getRouteKeyName(){
    //     return 'precio';
    // }
}
