<?php

namespace App\Http\Controllers\User;

use App\Exceptions\InvalidRequestException;
use App\Http\Controllers\Controller;
use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        $userModel = UserModel::where('wx_openid' , $user->id)->first();
        if (!$userModel){
            $userModel = UserModel::create([
                'wx_openid' => $user->id
            ]);
        }
        Auth::guard('user')->login($userModel);

        return redirect('/static/#/h5/index');
    }
}
