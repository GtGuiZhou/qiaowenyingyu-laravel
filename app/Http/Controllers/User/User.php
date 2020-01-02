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
        $user->at_school = $data['at_school'];
        $user->baby_name = $data['baby_name'];
        $user->school = $data['school'];
        $user->class = $data['class'];
        $user->phone = $data['phone'];
        $user->baby_age = $data['baby_age'];
        $user->at_area = $data['at_area'];
        $user->is_save_info = 'yes';
        $user->save();
    }

    public function submitScore(Request $request,$score)
    {
        $data = $request->input();
        $user = Auth::guard('user')->user();
        $user->chineseResult()->create(['score' => $score]);
    }

    public function isLogin()
    {
        return Auth::guard('user')->user();
    }
}