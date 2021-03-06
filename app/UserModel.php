<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    //
    protected $table = 'user';
    public $timestamps = false;
    protected $guarded = [];

    public function chineseResult()
    {
        return $this->hasMany(ChineseResultModel::class,'user_id','id');
    }
}
