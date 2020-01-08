<?php

namespace App\Http\Controllers\Api;

use App\FileModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

class File extends Controller
{

    /**
     * @var FileModel
     */
    protected $model;

    public function __construct()
    {
        $this->model = new FileModel();
    }

    public function upload(Request $request)
    {
        $files = $request->file('file');
        $result = [];
        foreach ($files as $file){
            $model = $this->model->saveFile($file);
            $result[] = "/api/files/read/{$model->md5}";
        }
        return $result;
    }

    public function read($md5)
    {
        $file = $this->model->where('md5',$md5)->first();
        $url = $file?$file->url:'assets/image_loading_fail.png';
        return redirect($url);
    }
}
