<?php


use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');

});

Route::resource('admin/categories',  \App\Http\Controllers\Admin\CategoryController::class);
Route::resource('admin/tags',  \App\Http\Controllers\Admin\TagController::class);
Route::resource('admin/posts',  \App\Http\Controllers\Admin\PostController::class);


