<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class CatalogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $books = Book::paginate(6);
        return view('catalogs.index', compact('books'));
    }
}
