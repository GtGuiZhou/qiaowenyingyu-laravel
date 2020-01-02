<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChineseModel extends Model
{
    //
    public $timestamps = false;
    protected $table = 'chinese';
    protected $fillable = ['text','voice','library_id','similar_id'];

    public function similar()
    {
        return $this->belongsTo(ChineseModel::class,'similar_id','id');
    }
}
