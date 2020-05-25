<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
//use Dotenv\Validator;
use App\Book;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::paginate(2);
        return view('Admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }


    public function store(BookCreateRequest $request)
    {
        $data = $request->all();
//        return $data;
        $this->storeImages($request);
        $data['images'] = $request->images;
        $bookCreated = Book::create($data);
        $book_id = $bookCreated->id;
        if ($data['categories']) {
            $bookCreated->categories()->sync($data['categories']);
        }
        Session::flash('success', 'Add Book successfully');
        return redirect(route('books.index'));
    }

    private function storeImages($request)
    {
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $getHashName = $image->hashName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $getHashName);
            $request->images = $getHashName;
        }
    }

    public function edit($id)
    {
        $category = Category::all();
        $books = Book::findOrFail($id);
        return view('admin.books.edit', compact('books', 'category'));
    }

    public function update(BookCreateRequest $request, $id)
    {
        $books = Book::findOrFail($id);
        $data = $request->all();
        $this->storeImages($request);
        $data['images'] = $request->images;
        $books->update($data);
        return redirect()->route('books.index');

    }

    public function destroy($id)
    {
        $books = Book::findOrFail($id);
        $books->categories()->detach();
        $books->delete();
        return redirect()->route('books.index');

    }


}
