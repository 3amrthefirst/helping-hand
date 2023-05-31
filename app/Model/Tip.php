<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $table = "tips";
    protected $fillable=['title' , 'image'];
    public $timestamps = true ;

    public function setImageAttribute($value)
    {
        $extension = $value->getClientOriginalExtension() ?: 'png';
        $picture = 'tips_'.mt_rand(100000,999999). '.' . $extension;
        $this->attributes['image'] = is_file($value) ? $value->move('public/upload/tips' , $picture) : null;
    }
}
