<?php
use Illuminate\Support\facades\cache;

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

Route::get('/hogar', function () {
    return view('Home.home');
});

Route::get('/more/5/perrito', function () {
    return View::make('about');
});
Route::get('/more/{id}/{name}', function ($id,$name) {
    return "este es un numero ". $id." ".$name;
});
Route::get('admin/poster/example',array('as' => 'admin.home', function(){
    $url=route('admin.home');
    return "this url is ". $url;
}));
Route::get('about-page',function(){
    return view('other.form');
})->name('other.about');
Route::post('about-page',function(){
    return view('other.form');
})->name('other.aboutpost');

Route::get('/cache', function() {
    return Cache::get('key');
});
Route::group(['prefix'=>'admins'],function(){
    Route::get('',function(){
        return view('about');
    })->name('admin.index');
    
    Route::get('pruebados', function() {
        return view('about');
    })->name("admin.prueba2");

    Route::get('blog/{id}/{nombre}/{edad}', 'blog\CommentController@index' )->name("admin.blog");
    
});

Route::resource('bloger', 'blog\CommentController');



