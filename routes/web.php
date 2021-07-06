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

//Misc routes
Route::get('/', function() {
    return view('home.frontpage');
})->name('home');
Route::get('/aboutUs', function() {
    return view('misc.about');
})->name('aboutUs');

//Buyer routes
Route::get('/customers', [BuyerController::class, 'getBuyers'])
    ->name('getBuyers');
Route::get('/getBuyerForEdit/{buyerId}', [BuyerController::class, 'getBuyerForEdit'])
    ->name('getBuyerForEdit');
Route::post('/editBuyer/{buyerId}', [BuyerController::class, 'editBuyer'])
    ->name('editBuyer');

Route::get('/addBuyer', function() {
    return view('customers.addCustomer');
});
Route::post('/addBuyer', [BuyerController::class, 'addBuyer'])
    ->name('addBuyer');
    Route::post('/deleteBuyer{buyerId}', [BuyerController::class, 'deleteBuyer'])
    ->name('deleteBuyer');

//Plant routes
Route::get('/addPlant', function() {
    return view('plants.addPlant');
})->name('getAddPlant');
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
Route::get('addPlot', [PlotController::class, 'getAddPlot'])
    ->name('getAddPlot'); // <-change this to just return a view
Route::post('addPlot', [PlotController::class, 'addPlot'])
    ->name('getAddPlot');
Route::get('/viewPlot/{plotId}', [PlotController::class, 'getPlot'])
    ->name('getPlot');
Route::get('editPlot', [PlotController::class, 'getPlotForEdit'])
    ->name('getPlotForEdit');
Route::post('editPlot', [PlotController::class, 'editPlot'])
    ->name('editPlot');
Route::post('deletePlot', [PlotController::class, 'deletePlot'])
    ->name('deletePlot');


//Transaction routes
Route::get('/viewTransactions', [TransactionController::class, 'getTransactions'])
    ->name('viewTransactions');
Route::get('/viewTransaction/{transactionId}', [TransactionController::class, 'getTransaction'])
    ->name('getTransaction');
