<?php

namespace App\Http\Controllers\Admin;

use App\ChineseLibraryModel;
use App\FileModel;
use App\Http\Controllers\Controller;
use App\Http\Traits\CrudTrait;
use Illuminate\Http\Request;

class ChineseLibrary extends Controller
{
    use CrudTrait;
    /**
     * @var ChineseLibraryModel
     */
    protected $model;

    public function __construct()
    {
        $this->model = new ChineseLibraryModel();
    }

    public function chinese($id)
    {
        $this->model = $this->model->findOrFail($id);
        $list = $this->model->chinese()->get();
        return $list;
    }

    public function chineseBatch(Request $request, $id)
    {
        $this->model = $this->model->findOrFail($id);
        $files = $request->file('files');
        $chineseList = [];
        foreach ($files as $file) {
            $ext = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $name = explode('.',$name)[0];
            if ($ext == 'mp3') {
                $fileModel = FileModel::saveFile($file);
                $url = $fileModel->url;
                $this->model->chinese()->create( [
                    'text' => $name,
                    'voice' => $url
                ]);
            }
        };

//        $this->model->chinese()->saveMany($chineseList);

    }





}
