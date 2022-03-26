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

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::view('/contact', 'contact');

// Route::get('/flights', function () {
//     // $flights = App\Models\Flight::get();                                 // SELECT * FROM flights;
//     // $flights = App\Models\Flight::where('active', 1)->take(2)->get();    // SELECT * FROM flights WHERE active = 1 LIMIT 2;
//     // $flights = App\Models\Flight::paginate(2);                           // lapozhatóság: 2 repülőgépjárat egy lapon
//     // $flights = App\Models\Flight::latest('created_at')->get();           // SELECT * FROM flights ORDER BY created_at DESC;
//     // return $flights;

//     return view('flights', [
//         'flights' => App\Models\Flight::latest()->get()
//     ]);
// });

Route::get('/flights/{flight}',[App\Http\Controllers\FlightsController::class, 'show']);
Route::get('/flights',[App\Http\Controllers\FlightsController::class, 'index']);

Route::get('/airlines/{airline}',[App\Http\Controllers\AirlinesController::class, 'show']);
Route::get('/airlines',[App\Http\Controllers\AirlinesController::class, 'index']);

Route::get('/cities/{city}',[App\Http\Controllers\CitiesController::class, 'show']);
Route::get('/cities',[App\Http\Controllers\CitiesController::class, 'index']);
