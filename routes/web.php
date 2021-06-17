<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;

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

Route::get('/', function() {
    return view('app');
})->name('home');


// Route::get('link/{parameter}', [NameController::class, 'function'])
//     ->name('routeName');


//Buyer routes


//Plant routes
Route::get('/addPlant', function() {
    return view('plants.addPlant');
});
Route::post('/dodaj-biljku', [PlantController::class, 'addPlant'])
    ->name('addPlant');

Route::get('/viewPlant/{$plantId}', [PlantController::class, 'getPlant'])
    ->name('viewPlant'); //DODAJ-BILJKU SKONTAT

//Planter routes


//Planting routes


//Plot routes


//Transaction routes

