<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use App\User;
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/test', function () {
//    $bills = \App\Bill::all();
//    $userIds = array_map(function ($bill){
//        return $bill['user_id'];
//    },$bills->toArray());
//    $users = \App\User::whereIn('id',$userIds)->get();
//    $newBills = [];
//    foreach ($bills as $bill){
//        $user = $users->firstWhere('id','=',$bill->user_id);
//        $newBills[] = [
//            'id'=>$bill->id,
//            'user_id'=>$bill->user_id,
//            'user'=>[
//                'id'=>$user->id,
//                'name'=>$user->name
//            ]
//        ];
//    }
//    return view('test');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin' ,
    'namespace'=>'Admin',
    'middleware'=>['auth','checkAdmin'],
    ],function(){
    Route::get('/','AdminController@index');
    Route::resource('users','UserController');
    Route::resource('books','BookController');
    Route::resource('category','CategoriesController');
    Route::resource('bill','BillController');
});
//Route::get('/image','testController@create')->name('image.create');
//Route::get('/image/home','testController@index')->name('image.index');
//Route::post('/image','testController@store')->name('image.store');

