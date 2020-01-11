<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\WordModel;

class Word extends Controller
{


    /**
     * @var WordModel
     */
    private $model;

    public function __construct()
    {
        $this->model = new WordModel();
    }

    public function level($levelName)
    {
        $list = $this->model
            ->whereRaw('FIND_IN_SET(?,level)',[$levelName])->get();
        return $list;
    }
}
