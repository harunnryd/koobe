<?php

namespace App\Observers;

use App\Category;

class CategoryObserver
{
    public function created(Category $category)
    {
       flash('Success created '. $category->title. ' :D')->success()->important();
       \Log::info('berhasil menyimpan :D');
    }

    public function updated(Category $category)
    {
        flash('Success updated '. $category->title. ' :D')->success()->important();
       \Log::info('berhasil mengupdate '. $category->title. ' :D');
    }

    public function deleting(Category $category)
    {
        //
    }

    public function deleted(Category $category)
    {
        flash('success delete book')->error()->important();
        \Log::info('berhasil menghapus :( '. $category->title);
    }
}