<?php

namespace App\Http\Controllers\Admin;

use App\ChineseModel;
use App\FileModel;
use App\Http\Controllers\Controller;
use App\Http\Traits\CrudTrait;
use Illuminate\Http\Request;

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

    public function batch(Request $request)
    {
        $files = $request->file('files');
        foreach ($files as $file) {
            $ext = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $name = explode('.',$name)[0];
            if ($ext == 'mp3') {
                $fileModel = FileModel::saveFile($file);
                $url = $fileModel->url;
                $this->model->create( [
                    'text' => $name,
                    'voice' => $url
                ]);
            }
        };
    }

    public function recognize()
    {
        $list = $this->model->where('similar_id','<>',0)->get();
        return $list;
    }
}
