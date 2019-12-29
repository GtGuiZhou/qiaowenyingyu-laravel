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
    fastCrudRouter('chinese_libraries',"Admin\ChineseLibrary");
    fastCrudRouter('chinese',"Admin\Chinese");
    fastCrudRouter('chinese_level',"Admin\ChineseLevel");
    Route::get('chinese_libraries/{id}/chinese',"Admin\ChineseLibrary@chinese");
    Route::get('chinese_libraries/all',"Admin\ChineseLibrary@all");
    Route::post('chinese_libraries/{id}/chinese_batch',"Admin\ChineseLibrary@chineseBatch");
});
