<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $table = "tips";
    protected $fillable=['title' , 'image'];
    public $timestamps = true ;
}
