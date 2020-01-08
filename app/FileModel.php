<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileModel extends Model
{
    //
    public $timestamps = false;
    protected $table = 'file';
    protected $fillable = ['url','md5'];

    public static function saveFile(UploadedFile $file)
    {
        $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'),$fileName);
        $url = '/uploads/'.$fileName;
        $md5 = md5($url);
        return self::create(compact('url','md5'));;
    }
}
