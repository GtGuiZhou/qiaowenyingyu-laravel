<?php

namespace App\Http\Controllers\Admin;

use App\ChineseModel;
use App\Http\Controllers\Controller;
use App\Http\Traits\CrudTrait;
use App\UserModel;
use Illuminate\Http\Request;

class User extends Controller
{
    use CrudTrait;



    /**
     * @var UserModel
     */
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function chineseResult($id)
    {
        $this->model = $this->model->findOrFail($id);
        $list = $this->model->chineseResult()->get();
        return $list;
    }
}
