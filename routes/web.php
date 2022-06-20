<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\CategorieController;
use  App\Http\Controllers\SousCategorieController;
use  App\Http\Controllers\PlainteController;





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
Route::get('/dashboard',[UserController::class,'GETDASH'])->name('GETDASH');

Route::get('/add-categorie',[CategorieController::class,'GETPAGEADDCATEGORY'])->name('GETPAGEADDCATEGORY')

;
Route::get('/list-categorie',[CategorieController::class,'GETLISTECATEGORY'])->name('GETLISTECATEGORY');
Route::get('/update-categorie',[CategorieController::class,'GETPAGEUPDATECATEGORY'])->name('GETPAGEUPDATECATEGORY');


Route:: post('/add-categorie',[CategorieController::class,'ADDCATEGORY'])->name('ADDCATEGORY');
Route:: post('update-categorie/{id}',[CategorieController::class,'UPDATECATEGORY'])->name('UPDATECATEGORY');
Route:: post('delete-categorie/{id}',[CategorieController::class,'DELETECATEGORY'])->name('DELETECATEGORY');

/**  sous categorie*/


Route::get('/add-souscategorie',[SousCategorieController::class,'GETPAGEADDSOUSCATEGORY'])->name('GETPAGEADDSOUSCATEGORY');
Route::get('/list-souscategorie',[SousCategorieController::class,'GETLISTESOUSCATEGORY'])->name('GETLISTESOUSCATEGORY');
Route::get('/update-souscategorie',[SousCategorieController::class,'GETPAGEUPDATSOUSCATEGORY'])->name('GETPAGEUPDATSOUSCATEGORY');


Route:: post('/add-souscategorie',[SousCategorieController::class,'ADDSOUSCATEGORY'])->name('ADDSOUSCATEGORY');
Route:: post('update-souscategorie/{id}',[SousCategorieController::class,'UPDATESOUSCATEGORY'])->name('UPDATESOUSCATEGORY');
Route:: post('delete-souscategorie/{id}',[SousCategorieController::class,'DELETESOUSCATEGORY'])->name('DELETESOUSCATEGORY');
/**** users */

Route::get('/add-user',[UserController::class,'GETPAGEADDUSER'])->name('GETPAGEADDUSER');
Route::get('/list-user',[UserController::class,'GETLISTEUSER'])->name('GETLISTEUSER');
Route::get('/update-user',[UserController::class,'GETPAGEUPDATEUSER'])->name('GETPAGEUPDATEUSER');
Route::get('/login',[UserController::class,'GOCONNECT'])->name('GOCONNECT');
Route::get('/update-mes-infos',[UserController::class,'GETPAGEUPDATEMESINFO'])->name('GETPAGEUPDATEMESINFO');

Route::get('/deconnexion',[UserController::class,'LOGOUT'])->name('LOGOUT');



Route:: post('/add-user',[UserController::class,'ADDUSER'])->name('ADDUSER');
Route:: post('update-user/{id}',[UserController::class,'UPDATEUSER'])->name('UPDATEUSER');
Route:: post('dashboard',[UserController::class,'AUTHENTIFICATION'])->name('AUTHENTIFICATION');
Route:: post('update-my-info',[UserController::class,'UPDATEMYINFO'])->name('UPDATEMYINFO');




/**** les plaintes */

Route::get('/add-plainte',[PlainteController::class,'GETPAGEADDPLAINTE'])->name('GETPAGEADDPLAINTE');
Route::get('liste-mes-plaintes',[PlainteController::class,'GETLISTEPLAINTEBYID'])->name('GETLISTEPLAINTEBYID');
Route::get('update-ma-plainte',[PlainteController::class,'GETPAGEUPDATEMAPLAINTE'])->name('GETPAGEUPDATEMAPLAINTE');
Route::get('liste-plainte-non-traite',[PlainteController::class,'GETPAGELISTEPLAINTENONTRAITE'])->name('GETPAGELISTEPLAINTENONTRAITE');
Route::get('liste-plainte-traite',[PlainteController::class,'GETPAGELISTEPLAINTETRAITE'])->name('GETPAGELISTEPLAINTETRAITE');
Route::get('voir-reponse-plainte',[PlainteController::class,'GETPAGESEEREPONSE'])->name('GETPAGESEEREPONSE');

Route::get('traite-plainte',[PlainteController::class,'GETPAGETRAITEPLAINTE'])->name('GETPAGETRAITEPLAINTE');





Route::post('/add-plainte',[PlainteController::class,'ADDPLAINTE'])->name('ADDPLAINTE');
Route::post('update-plainte/{id}',[PlainteController::class,'UPDATEPLAINTE'])->name('UPDATEPLAINTE');
Route::post('traiter-plainte/{id}',[PlainteController::class,'TRAITEPLAINTE'])->name('TRAITEPLAINTE');













