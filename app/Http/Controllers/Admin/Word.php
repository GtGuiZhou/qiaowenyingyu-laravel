<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\CrudTrait;
use App\WordModel;
use Illuminate\Http\Request;

class Word extends Controller
{
    //
    use CrudTrait;

    /**
     * @var WordModel
     */
    private $model;

    public function __construct()
    {
        $this->model = new WordModel();
    }
}
