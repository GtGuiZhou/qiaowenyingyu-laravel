<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('user');
    }


    public function submitInfo(Request $request)
    {
        $data = $request->input();
        $user = Auth::guard('user')->user();
        $data['is_save_info'] = 'yes';
        $user->fillable($data)->save();
    }

    public function submitScore($score)
    {
        $user = Auth::guard('user')->user();
        $user->chineseResult()->create(['score' => $score]);
    }

    public function isLogin()
    {
        return Auth::guard('user')->user();
    }
}