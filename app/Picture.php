<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['path'];

    public function article(){
        return $this->belongsTo('App\Article');
    }
}
