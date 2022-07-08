<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // usersテーブルとのリレーション（従テーブル側）
public function user (){
     //1対多の「１」側なので単数系
    return $this->belongsTo('App\User');

}

public function getEditTweet(Int $user_id, Int $post_id) {
 return $this->where('user_id', $user_id)->where('id', $post_id)->first();
}


}
