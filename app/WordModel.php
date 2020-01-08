<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class WordModel extends Model
{
    public $timestamps = false;
    protected $table = 'word';
    protected $guarded = [];


}