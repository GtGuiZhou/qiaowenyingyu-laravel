<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    //
    protected $dateFormat = false;
    protected $table = 'student';
    protected $guarded = [];
}
