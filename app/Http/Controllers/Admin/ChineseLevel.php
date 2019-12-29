<?php

namespace App\Http\Controllers\Admin;

use App\ChineseLevelModel;
use App\Http\Controllers\Controller;
use App\Http\Traits\CrudTrait;

class ChineseLevel extends Controller
{
    use CrudTrait;


    /**
     * @var ChineseLevelModel
     */
    protected $model;

    public function __construct()
    {
        $this->model = new ChineseLevelModel();
    }


    public function indexWord($id)
    {
        $this->model = $this->model->findOrFail($id);
        $list = $this->model->words()->get();

        return $list;
    }

//    public function createWord(Request $request,$id)
//    {
//        $this->model = $this->model->findOrFail($id);
//        $data = $request->post();
//        $wordModel = WordModel::where('word',$data['word'])->first();
//        if ($wordModel){
//            if ($this->model->words()->find($wordModel->id)){
//                throw new InvalidRequestException('已存在该列表中');
//            }
//            $this->model->words()->attach($wordModel->id);
//        } else {
//          $wordModel =  $this->model->words()->create($data);
//        }
//
//        return $wordModel;
//    }



}
