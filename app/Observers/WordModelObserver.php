<?php

namespace App\Observers;

use App\Exceptions\ModelInternalException;
use App\WordModel;

class WordModelObserver
{

    public function creating(WordModel $wordModel)
    {
        if (WordModel::where('text',$wordModel->text)->count() > 0){
            throw new ModelInternalException('该单词已存在');
        }
    }

    /**
     * Handle the word model "created" event.
     *
     * @param  \App\WordModel  $wordModel
     * @return void
     */
    public function created(WordModel $wordModel)
    {
        //
    }

    /**
     * Handle the word model "updated" event.
     *
     * @param  \App\WordModel  $wordModel
     * @return void
     */
    public function updated(WordModel $wordModel)
    {
        //
    }

    /**
     * Handle the word model "deleted" event.
     *
     * @param  \App\WordModel  $wordModel
     * @return void
     */
    public function deleted(WordModel $wordModel)
    {
        //
    }

    /**
     * Handle the word model "restored" event.
     *
     * @param  \App\WordModel  $wordModel
     * @return void
     */
    public function restored(WordModel $wordModel)
    {
        //
    }

    /**
     * Handle the word model "force deleted" event.
     *
     * @param  \App\WordModel  $wordModel
     * @return void
     */
    public function forceDeleted(WordModel $wordModel)
    {
        //
    }
}
