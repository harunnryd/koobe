<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Book;

class BookComposer
{

    public function compose(View $view)
    {
        //$books = Book::paginate(5);
        //$view->with('books', $books);
    }
}