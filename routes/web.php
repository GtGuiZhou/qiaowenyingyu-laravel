<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


function fastCrudRouter($routerName, $controller)
{
    Route::get("$routerName", "$controller@index");
    Route::post($routerName, "$controller@create");
    Route::delete("$routerName/{id}", "$controller@delete");
    Route::put("$routerName/{id}", "$controller@edit");
}

Route::post('admin/admins/login', 'Admin\Admin@login');
Route::prefix('admin')
    ->middleware('auth:admin')// 注意要区分不同模块的用户
    ->group(function () {
    Route::put('admins/logout', 'Admin\Admin@logout');
    fastCrudRouter('admins',"Admin\Admin");
    fastCrudRouter('users',"Admin\User");
    fastCrudRouter('words',"Admin\Word");

});


Route::any('user/wechat/scope', 'User\WeChat@scope');
Route::any('user/wechat/redirect', 'User\WeChat@redirect');
Route::prefix('user')
//    ->middleware('auth:user')// 注意要区分不同模块的用户
    ->group(function () {
        Route::get('words/level/{levelName}','User\Word@level');
        Route::get('users/is_login','User\User@isLogin');
        Route::post('users/submit_info','User\User@submitInfo');
        Route::post('users/submit_score/{score}','User\User@submitScore');
        Route::get('students','User\Student@index');
    });

Route::prefix('api')->group(function () {
    Route::post('files/upload', 'Api\File@upload');
    Route::get('files/read/{md5}', 'Api\File@read');
    Route::get('files/download/{md5}', 'Api\File@download');
});

