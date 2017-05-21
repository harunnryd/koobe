<?php

namespace App\Observers;
use App\Book;

class BookObserver
{

    public function created(Book $book)
    {
        flash()->success('Published Book : '. $book->title. ' success :D')->important();
        app('log')->info('berhasil membuat '. $book->title);
    }

    public function updated(Book $book)
    {
        flash()->success('Update Book : '. $book->title. ' success :D')->important();
        app('log')->info('berhasil mengupdate '. $book->title);
    }

    public function deleted(Book $book)
    {
        flash()->success('Delete Book : '. $book->title. ' success :D')->important();
        app('log')->info('berhasil menghapus '. $book->title);
    }
}