<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\CommandeController as BackCommandeController;
use App\Http\Controllers\Back\ArticleController as BackArticleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', [App\Http\Controllers\AccueilController::class, 'index']);

Route::post('panier/addArticle', [PanierController::class, 'addArticle'])->name('addArticle');

Route::post('panier/adds', [PanierController::class, 'adds'])->name('adds');

Route::post('home/search', [HomeController::class, 'searchArticle'])->name('searchArticle');

Route::post('panier/buy', [CommandeController::class, 'create'])->name('createCommande');

Route::get('fiche', function () {
    return view('ficheProduit');
});

Route::get('test', function () {
    return view('test');
})->name('testeur');
Route::get('commande', function () {
    return view('commande');
});

Route::post('/panier/fedapay', [PaiementController::class, 'creeTransaction'])->name('creeTransaction');

Route::get('show-magie', function () {
    return view('app');
});

Route::get('/panier/{id}/delete', [PanierController::class, 'erasePanier'])->name('erase_panier');

Route::get('/panier/{id}/delete/{id_a}', [PanierController::class, 'deleteInPanier'])->name('deleteInPanier');

Route::get('/mes_commandes/{id}', [CommandeController::class, 'showState'])->name('mes_commandes');

/*--------------------------LES COMMENTAIRES      ---------------------*/
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*---------------------------------------------------------------------*/

Route::post('/articles/evaluer', [CommentsController::class, 'create'])->name('createComment');

/*--------------------------RESSOURCES CRUD CLIENT---------------------*/
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*---------------------------------------------------------------------*/
Route::resource('users', UserController::class);

Route::resource('articles', ArticleController::class);

Route::resource('panier', PanierController::class);

Auth::routes();


/*-------------------------HOME ROUTES---------------------------------*/
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*                                                                     */
/*---------------------------------------------------------------------*/
Route::prefix('home')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/Hommes', [App\Http\Controllers\HomeController::class, 'homeH'])->name('homeH');
    Route::get('/Femmes', [App\Http\Controllers\HomeController::class, 'homeF'])->name('homeF');
    Route::get('/Enfants', [App\Http\Controllers\HomeController::class, 'homeE'])->name('homeE');
});

Route::prefix('home/habits')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'getHabit'])->name('getHabit');
    Route::get('/Hommes', [App\Http\Controllers\HomeController::class, 'getHabitH'])->name('getHabitH');
    Route::get('/Femmes', [App\Http\Controllers\HomeController::class, 'getHabitF'])->name('getHabitF');
    Route::get('/Enfants', [App\Http\Controllers\HomeController::class, 'getHabitE'])->name('getHabitE');
});

Route::prefix('home/pantalons')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'getPan'])->name('getPan');
    Route::get('/Hommes', [App\Http\Controllers\HomeController::class, 'getPanH'])->name('getPanH');
    Route::get('/Femmes', [App\Http\Controllers\HomeController::class, 'getPanF'])->name('getPanF');
    Route::get('/Enfants', [App\Http\Controllers\HomeController::class, 'getPanE'])->name('getPanE');
});

Route::prefix('home/chaussures')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'getChau'])->name('getChau');
    Route::get('/Hommes', [App\Http\Controllers\HomeController::class, 'getChauH'])->name('getChauH');
    Route::get('/Femmes', [App\Http\Controllers\HomeController::class, 'getChauF'])->name('getChauF');
    Route::get('/Enfants', [App\Http\Controllers\HomeController::class, 'getChauE'])->name('getChauE');
});



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
    Route::name('commandes')->get('/commandes', [BackCommandeController::class, 'index']);
    Route::name('updateC')->post('/commandes/update', [BackCommandeController::class, 'update']);
    Route::name('speedcreate')->get('/speed_create', [AdminController::class, 'speeder']);
    Route::resource('AdminArticle', BAckArticleController::class);
});

Route::get('mathias', function () {
    return view('menuSection');
});
