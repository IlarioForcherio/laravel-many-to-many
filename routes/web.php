<?php
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// da qui si gestiscono le rotte sotto autenticazione
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//QUI si creano le rotte sotto autenticazione(middleware):
//-il middleware verifica se l'utente e' loggato
//-namespace indica la cartella dove cercare il controller
//localhost:8000/admin ->prefix('admin')
//nome della rotta della route list es admin.index ->name('admin.')

Route::middleware('auth')
->namespace('Admin')
->prefix('admin')
->name('admin.')
->group(function(){

    Route::get('/', "HomeController@index")->name('index');
    //Aggiunta controller delle CRUD
    Route::resource('/posts', "PostsController");

});




//Qui si creano le rotte che non sono sotto autenticazione

Route::get('{any?}',function(){
    return view('guest.home');
})->where('any','.*');

//questa scritta vuol dire per ogni rotta che non e' compresa nella route middleware
//questo pezzo di codice va sempre alla fine

//creare nella cartella views ->cartella guest->home.blade.php


//per creare lo scaffolding di laravel con vue mandare i seguenti comandi:
//composer require laravel/ui:^2.4
//php artisan ui vue --auth
// npm install && npm run dev
//creare un controller che sara' visualizzato solo da un utente loggato:
//php artisan make:controller Admin/HomeController
