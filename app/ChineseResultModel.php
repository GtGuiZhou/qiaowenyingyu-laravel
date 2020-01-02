<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChineseResultModel extends Model
{
    //

    protected $table = 'chinese_result';
    protected $fillable = ['score'];
    public $timestamps = false;
}
