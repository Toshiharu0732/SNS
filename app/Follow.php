<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //usersテーブルとのリレーション
     public function users()
  {
    return $this->belongsToMany('App\user');
  }

   protected $fillable = ['following_id','followed_id',];

    protected $table = 'follows';
}
