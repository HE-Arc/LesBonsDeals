<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','description','price','quantity','category_id'];
    protected $attributes = ['number_of_view' => 0];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function pictures(){
        return $this->hasMany('App\Picture');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
