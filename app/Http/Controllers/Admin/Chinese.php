<?php

namespace App\Http\Controllers\Admin;

use App\ChineseModel;
use App\Http\Controllers\Controller;
use App\Http\Traits\CrudTrait;

class Chinese extends Controller
{

    use CrudTrait;
    /**
     * @var ChineseModel
     */
    protected $model;

    public function __construct()
    {
        $this->model = new ChineseModel();
    }
}
