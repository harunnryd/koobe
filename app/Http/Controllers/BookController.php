<?php

namespace App\Http\Controllers;

use \File;
use \Image;
use App\Book;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:writer')->except(['index']);;
    }

    public function index(Request $request)
    {
        $search = null;
        if ($request->has('search')) {
            $search = $request->get('search');
            $books = Book::where('title', 'like', '%'. $search. '%')
                    ->orWhere('author', 'like', '%'. $search. '%')
                    ->orWhere('desc', 'like', '%'. $search. '%')
                    ->orderBy('title')
                    ->paginate(5);
        } else {
            $books = Book::orderBy('title', 'desc')
                    ->paginate(5);
        }

        return view('books.index')->with(['books' => $books, 'search' => $search]);
    }

    public function create(Book $book)
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('books.create', compact('categories', 'book'));
    }

    public function store(BookRequest $request)
    {
        $data = $request->except(['photo', 'categories']);

        if ($request->hasFile('photo')) $data['photo'] = $this->savePhoto($request->file('photo'));
        
        $book = Book::create($data);
        $categories = [];
        
        foreach ($request->get('category') as $val) {
            $categories[] = $val;

        }

        $book->categories()->sync($categories);
        
        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return redirect()->back();
    }

    public function edit(Book $book)
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->categories()->sync($request->get('category'));
        $book->update($request->all());
        return redirect()->route('books.index');   
    }

    public function destroy(Book $book)
    {
        
        File::delete(public_path(). DIRECTORY_SEPARATOR. 'img'. DIRECTORY_SEPARATOR. $book->photo);
        $book->delete();

        return redirect()->back();
    }

    //save to folder and return string file :D

    public function savePhoto(UploadedFile $photo)
    {
        $name = str_random(6). '.'. $photo->guessClientExtension();
        $photo->move(public_path(). DIRECTORY_SEPARATOR. 'img', $name);

        \Image::make(public_path(). DIRECTORY_SEPARATOR. 'img'. DIRECTORY_SEPARATOR. $name)
                ->resize(300, 200)->save();
        return $name;
    }
}