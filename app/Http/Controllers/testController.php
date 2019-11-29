<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Book;

class testController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.books.test2',compact('books'));
    }

    public function create()
    {
        return view('admin.books.test');
    }

    public function store(Request $request)
    {
        $data = $request->all();
//        $this->validate($request, [
//            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
        request()->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $name = $image->getClientOriginalName();
//            $getClientOrginal = $image->getClientOriginalExtension();
            $getHashName = $image->hashName();
            $fileName = $request->file('images');
//            $path = Storage::putFile('/images', $fileName);
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $getHashName);

        }
        $newBook = Book::create([
            'name'=>'te',
            'images'=>$getHashName,
            'discriptions'=>'s',
            'excerpts'=>'a',
            'pubic_years'=>"232",
            'status'=>1
        ]);
    }
}
