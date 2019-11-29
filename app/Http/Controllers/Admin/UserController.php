<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));

    }
     public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index');
     }

     public function destroy($id){
        $user = User::findOrFail($id);
            $user->delete();
         return redirect()->route('users.index');

     }


}
