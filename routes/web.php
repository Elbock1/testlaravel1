<?php

use App\Http\Controllers\ArticleController; 
use Illuminate\Support\Facades\Route;     

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
    return redirect()->route('articles.index'); // Redirige la racine vers la liste des articles   
});                                                                          

// Routes RESTful pour les articles                                                                 
Route::resource('articles', ArticleController::class);                                          

                 
require __DIR__.'/auth.php';                                                                    // Ligne 25