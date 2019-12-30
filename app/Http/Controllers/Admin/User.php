<?php

namespace App\Http\Controllers\Admin;

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
}
