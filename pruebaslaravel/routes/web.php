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
    return view('other.about');
})->name('other.about');
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
    
});
