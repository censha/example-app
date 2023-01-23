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
})->name('home');


Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login.show');
Route::get('registration', [\App\Http\Controllers\AuthController::class, 'registration'])->name('registration');
Route::post('create', [\App\Http\Controllers\AuthController::class, 'create'])->name('create');
Route::post('user', [\App\Http\Controllers\AuthController::class, 'usershowpost'])->name('userpost');
Route::get('user/{id}', [\App\Http\Controllers\AuthController::class, 'usershow'])->name('user');


Route::group(['middleware' => ['auth']], function() {
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('show', [\App\Http\Controllers\UserController::class, 'show'])->name('show');
    Route::post('updated/user', [\App\Http\Controllers\UserController::class, 'updated'])->name('updated_user');
    Route::get('delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('delete');
    Route::get('films', [\App\Http\Controllers\FilmController::class, 'films'])->name('films');
    Route::get('add/{id}',[\App\Http\Controllers\FilmController::class, 'addFilm'])->name('add');
    Route::get('favourites',[\App\Http\Controllers\FilmController::class, 'favourites'])->name('favourites');
    Route::get('delete/favourites/{id}',[\App\Http\Controllers\FilmController::class, 'delete_favourites'])->name('delete_favourites');
    Route::get('films/loaderType={metod}',[\App\Http\Controllers\FilmController::class, 'loaderType'])->name('loaderType');
});

Route::get('posts', [\App\Http\Controllers\UserController::class, 'posts'])->name('posts');
