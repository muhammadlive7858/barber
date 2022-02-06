<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WorkController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\StilController;
use \App\Http\Controllers\BarberController;
use App\Http\Controllers\FrontendController;

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
    return view('welcome');
});

// Route::get('/users',function(){
//     return "Users";
// })->middleware('users');




// index.blade.php routes

Route::get('/',[FrontendController::class,'index']);

Route::get('/index',[FrontendController::class,'index']);



Route::get('/services',function(){
    return view('services');
});
Route::get('/contact',function(){
    return view('contact');
});
Route::get('/blog',function(){
    return view('blog');
});
Route::get('/single',function(){
    return view('single');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('/barber-shop',[FrontendController::class,'barbershop']);


Route::prefix('admin')->middleware(['users','auth'])->name('admin.')->group(function(){
    // works route group
    Route::resource('works', WorkController::class)->names('works');
    // stills route group
    Route::resource('stills', StilController::class)->names('stills');

    // barbers route group
    Route::resource('barbers', BarberController::class)->names('barbers');

    // users route group
    Route::resource('users', UserController::class)->names('users');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('users')
    ->name('home');
