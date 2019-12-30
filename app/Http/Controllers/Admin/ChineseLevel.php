<?php

namespace App\Http\Controllers\Admin;

use App\ChineseLevelModel;
use App\ChineseModel;
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




    public function chinese($id)
    {
        $this->model = $this->model->findOrFail($id);
        $list = $this->model->chinese()->get();
        return $list;
    }

    public function insertChinese($id,$chinese_id)
    {
        $this->model = $this->model->findOrFail($id);
        $chinese = ChineseModel::findOrFail($chinese_id);
        $this->model->chinese()->attach($chinese_id);
        return $chinese;
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
