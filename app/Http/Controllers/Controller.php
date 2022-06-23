<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


   public function profile ()
    {
        $request->validate([
            'username' => 'required|max:12|min:2',
        ]);
        // Authからuser取り出し
        $user = Auth::users();
        $params = $request->all();
        // パラメータをセットして更新
        $user->fill($params)->save();

        // flashメッセージつけてリダイレクト
        return redirect('/profile')->with('flash_message', 'ユーザー情報を編集しました');
    }


}
