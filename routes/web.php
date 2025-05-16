<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Models\productmodel;
use App\Models\productoutmodel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/', function () {
//    return view('/home');
// })->name('home')->middleware('guest');

Route::get('/signup', function () {
    return view('signup');
})->name('signup')->middleware('guest');

Route::get('/signin', function () {
    return view('signin');
})->middleware('guest');

Route::get('/product', function () {
    return view('product');
})->name('product')->middleware('auth');

Route::get('/create', function () {
    return view('create');
})->middleware('auth');
Route::get('/addcat', function () {
    return view('addcat');
})->middleware('auth');
Route::get('/report', function () {
    return view('report');
})->middleware('auth');


Route::get('/home',[usercontroller::class,'home'])->name('home')->middleware('auth');

Route::post('/signup',[usercontroller::class,'signup'])->name('signup')->middleware('guest');
Route::post('/signin',[usercontroller::class,'signin'])->name('signin')->middleware('guest');
Route::post('/logout',[usercontroller::class,'logout'])->name('logout');

Route::get('/create',[usercontroller::class,'showcreate'])->name('create')->middleware('auth');
Route::post('/create',[usercontroller::class,'create'])->name('create')->middleware('auth');
Route::post('/product',[usercontroller::class,'product'])->name('product')->middleware('auth');
Route::get('/product', [usercontroller::class, 'product'])->name('product')->middleware('auth');

Route::get('/product/{product}/edit', [Usercontroller::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/product/{product}/update', [Usercontroller::class, 'update'])->name('update')->middleware('auth');
Route::delete('/product/{product}/destroy', [Usercontroller::class, 'destroy'])->name('destroy')->middleware('auth');

//category
Route::get('/category',[usercontroller::class, 'category'])->name('category')->middleware('auth');
Route::post('/category',[usercontroller::class, 'category'])->name('category')->middleware('auth');

Route::post('/addcat',[usercontroller::class, 'addcat'])->name('addcat')->middleware('auth');
Route::get('/category/{category}/editcat',[usercontroller::class,'editcat'])->name('editcat')->middleware('auth');
Route::put('/category/{category}/updatecat',[usercontroller::class,'updatecat'])->name('updatecat')->middleware('auth');
Route::delete('/category/{category}/deletecat',[usercontroller::class,'deletecat'])->name('deletecat')->middleware('auth');


//productout table 
Route::get('/productout',[usercontroller::class,'productout'])->name('productout');
Route::post('/productout',[usercontroller::class,'productout'])->name('productout');
Route::post('/showaddout',[usercontroller::class,'addout'])->name('addout');
Route::post('/addout',[usercontroller::class,'addout'])->name('addout');
Route::get('/productout{productout}/editout',[usercontroller::class,'editout'])->name('editout');
Route::put('/productout{productout}/updateout',[usercontroller::class,'updateout'])->name('updateout');
Route::delete('/productout{productout}/deleteout',[usercontroller::class,'deleteout'])->name('deleteout');



//dashboard
Route::get('/dash',[usercontroller::class,'dash'])->name('dash')->middleware('auth');
// Route::get('/home',[usercontroller::class,'home'])->name('home')->middleware('auth');

//report
Route::get('/report',[usercontroller::class, 'report'])->name('report')->middleware('auth');



