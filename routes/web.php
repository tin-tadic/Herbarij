<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlanterController;
use App\Http\Controllers\PlantingController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\TransactionController;

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

// Route::get('link/{parameter}', [NameController::class, 'function'])
//     ->name('routeName');

//FRONTPAGE
Route::get('/', function() {
    return view('home.frontpage');
})->name('home');

//Buyer routes
Route::get('/customers', [BuyerController::class, 'getBuyers'])
    ->name('getBuyers');

Route::get('/getBuyerForEdit/{buyerId}', [BuyerController::class, 'getBuyerForEdit'])
    ->name('getBuyerForEdit');
Route::post('/editBuyer{buyerId}', [BuyerController::class, 'editBuyer'])
    ->name('editBuyer');

Route::post('/deleteBuyer{buyerId}', [BuyerController::class, 'deleteBuyer'])
    ->name('deleteBuyer');

Route::get('/addBuyer', [BuyerController::class, 'getAddBuyer'])
    ->name('getAddCustomer');
Route::post('/addBuyer', function() {
    return view('customers.addCustomer');
});

//Plant routes
Route::get('/addPlant', function() {
    return view('plants.addPlant');
});
Route::post('/dodaj-biljku', [PlantController::class, 'addPlant'])
    ->name('addPlant');
Route::get('/viewPlant/{plantId}', [PlantController::class, 'getPlant'])
    ->name('viewPlant');
Route::get('/plants', [PlantController::class, 'getPlants'])
    ->name('getPlants');
Route::get('/editPlant/{plantId}', [PlantController::class, 'getPlantForEdit'])
    ->name('getPlantForEdit');
Route::post('/editPlant/{plantId}', [PlantController::class, 'editPlant'])
    ->name('editPlant');
Route::post('/deletePlant/{plantId}', [PlantController::class, 'deletePlant'])
    ->name('deletePlant');


//Planter routes
Route::get('/viewPlanter/{planterId}', [PlanterController::class, 'getPlanter'])
    ->name('getPlanter');


//Planting routes
Route::get('/viewPlanting/{plantingId}', [PlantingController::class, 'getPlanting'])
    ->name('getPlanting');


//Plot routes
Route::get('/viewPlot/{plotId}', [PlotController::class, 'getPlot'])
    ->name('getPlot');


//Transaction routes
Route::get('/viewTransactions', function() {
    return view('transactions.viewTransactions');
});
Route::get('/viewTransaction/{transactionId}', [TransactionController::class, 'getTransaction'])
    ->name('getTransaction');