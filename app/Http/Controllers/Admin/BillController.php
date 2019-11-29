<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\Book;
use App\User;
use App\BillDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with(['user','details'=>function($query){
            $query->with('book');
        }])->limit(10)->get();
//        return $bills;
        return view('Admin.bill.index',compact('bills'));
    }

    public function create()
    {
        $users = User::paginate(10);
        $books = Book::all();
        return view('Admin.bill.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
//        return $data;
        $createBill = Bill::create($data);
        $getBook = [];
//        foreach ($data['books'] as $book) {
//            $getBook [] = ([
//                'book_id' => $book,
//
//            ]);
//        }
//        dd($data['books']);


        if ($data['books']) {
            $createBill->details()->createMany($data['books']);
        }

        Session::flash('success', 'Add Book successfully');
        return redirect()->route('bill.index');
        Session::flash('success', 'Add Book successfully');
    }
    public function edit($id){
        $bill = Bill::with('details')->find($id);

        $selectedBookIds = array_map(function ($detail){
            return $detail['book_id'];
        },$bill->details->toArray());
        $users = User::all();
        $books = Book::all();
        return view('admin.bill.edit',compact('bill','users','books','selectedBookIds'));
    }
    public function update(Request $request, $id){
        $bill = Bill::find($id);
       $bill->update($request->only(['user_id','refund_day','borrow_day','status']));
       $bill->details()->delete();
        if ($request->get('books')) {
            $bill->details()->createMany($request->get('books'));
        }

        Session::flash('success', 'Edit Book successfully');
        return redirect()->back();
    }
    public function destroy($id){
        $bill = Bill::findOrFail($id);
        $bill->details()->delete();
        $bill->delete();
        return redirect()->back();
    }
}
