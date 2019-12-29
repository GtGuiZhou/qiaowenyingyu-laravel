<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChineseLevelModel extends Model
{
    //
    protected $table = 'chinese_level';
    public $timestamps = false;
    protected $fillable = ['name','library_id','mode'];

    public function children()
    {
        return $this->hasMany(ChineseLevelModel::class,'pid','id');
    }

    public function library()
    {
        return $this->belongsTo(ChineseLibraryModel::class,'id','library_id');
    }
}
