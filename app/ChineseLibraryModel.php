<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChineseLibraryModel extends Model
{
    //
    public $timestamps = false;
    protected $table = 'chinese_library';
    protected $fillable = ['name'];

    public function chinese()
    {
        return $this->hasMany(ChineseModel::class,'library_id','id');
    }


}
