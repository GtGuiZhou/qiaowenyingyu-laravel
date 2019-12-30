<?php

namespace App\Http\Controllers\Admin;

use App\ChineseResultModel;
use App\Http\Controllers\Controller;
use App\Http\Traits\CrudTrait;
use Illuminate\Http\Request;

class ChineseResult extends Controller
{
    use CrudTrait;

    /**
     * @var ChineseResultModel
     */
    protected $model;

    public function __construct()
   {
       $this->model = new ChineseResultModel();
   }

}
