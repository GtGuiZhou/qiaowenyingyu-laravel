<?php

namespace App\Http\Controllers\User;

use App\ChineseLevelModel;
use App\Http\Controllers\Controller;

class ChineseLevel extends Controller
{

    /**
     * @var ChineseLevelModel
     */
    protected $model;

    public function __construct()
    {
        $this->model = new ChineseLevelModel();
    }

    public function getLevel($id)
    {
        $this->model = $this->model->findOrFail($id);
        $list = $this->model->chinese()->inRandomOrder()
            ->when($this->model->mode == '2-1',function ($query){
                $query->where('similar_id','<>',0)->with(['similar']);
            })
            ->take(4)->get();

        return [
            'level' => $this->model,
            'chinese' => $list
        ];

    }



}
