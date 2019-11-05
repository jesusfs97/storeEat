<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Description;

class Product extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
}
