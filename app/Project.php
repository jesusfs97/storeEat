<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{   
    protected $table = 'desayunos';
    protected $fillable = ['titulo', 'descripcion', 'precio' ];
    // public function getRouteKeyName(){
    //     return 'precio';
    // }
}
