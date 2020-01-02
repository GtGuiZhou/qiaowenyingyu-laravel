<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeChat extends Controller
{
    //
    public function getLoginUrl()
    {

    }

    public function scope()
    {
        $app = app('wechat.official_account');
        $response = $app->oauth->scopes(['snsapi_base'])
            ->redirect(url('/user/wechat/redirect'));;

        return $response;
    }

    public function redirect()
    {
        $app = app('wechat.official_account');
        $oauth = $app->oauth;
// 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        $user = UserModel::firstOrCreate([
            'wx_openid' => $user->id
        ]);
        Auth::guard('user')->login($user);

        return redirect('/static/#/h5/index');
    }
}
