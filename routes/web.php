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

Route::get('/', function () {
    return view('login');
});

Route::get('user',function(){
    return view('admin.index');
});

Route::get('admin/user/{id}',function($id){
    return view('admin.show-user',compact('id'));
});
Route::get('user/create',function(){
    return view('admin.create-user');
});

Route::get('/register', function () {
    return view('admin.register');
});


