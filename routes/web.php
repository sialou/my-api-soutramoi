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
//old
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dealings', [DealingsController::class, 'index'])->name('dealings');
//Route::post('/dealings', [LoginController::class, 'store']);

Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites');
//Route::post('/register', [RegisterController::class, 'store']);

Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
//ajout
Route::get('/likes', [LikesController::class, 'index'])->name('likes');
Route::get('/locations', [LocationsController::class, 'index'])->name('locations');

//Route::get('/professional', [ProfessionalController::class, 'index'])->name('professional');
Route::get('/professional', 'App\Http\Controllers\ProfessionalController@index');

Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
