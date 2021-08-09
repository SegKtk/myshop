<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\ArticleController as BackArticleController;
use App\Http\Controllers\PhotoController;
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
    return view('home');
});



Route::get('test', function () {
    return view('layouts.app');
});

Route::get('show-magie', function () {
    return view('app');
});

Route::resource('users', UserController::class);

Route::resource('articles', ArticleController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*-----------------------------TEST-----------------------------------*/
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*---------------------------------------------------------------------*/



Route::get('photo', [PhotoController::class, 'create']);
Route::post('photo', [PhotoController::class, 'store']);

/*-----------------------------ADMIN-----------------------------------*/
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*---------------------------------------------------------------------*/


Route::view('admin','back.layout');

Route::prefix('admin')->group(function () {
    Route::name('admin')->get('/', [AdminController::class, 'index']);
    Route::name('articles')->get('/articles', [AdminController::class, 'getArticle']);
    Route::name('commandes')->get('/commandes', [AdminController::class, 'getCommande']);
   Route::resource('AdminArticle', BAckArticleController::class);
});