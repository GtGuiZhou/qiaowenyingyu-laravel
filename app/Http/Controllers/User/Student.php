<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\StudentModel;

class Student extends Controller
{
    /**
     * @var StudentModel
     */
    private $model;

    public function __construct()
   {
       $this->model = new StudentModel();
   }

    public function index()
    {
        $list = $this->model->get();

        return $list;
   }
}
