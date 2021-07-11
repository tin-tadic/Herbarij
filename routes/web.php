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
Route::post('/plantSearch', [PlantController::class, 'lookForPlant'])
    ->name('lookForPlant');


//Planter routes
Route::get('/addPlanter', function() {
    return view('planters-plots.planterAdd');
})->name('getAddPlanter');
Route::post('/addPlanter', [PlanterController::class, 'addPlanter'])
    ->name('addPlanter');
Route::get('/searchForPlanter', [PlanterController::class, 'searchForPlanter'])
    ->name('searchForPlanter');
Route::get('/lookForPlanter', function() {
    return view('planters-plots.planterSearch');
})->name('lookForPlanter');
Route::get('/viewPlanter/{planterId}', [PlanterController::class, 'getPlanter'])
    ->name('getPlanter');
Route::get('/editPlanter/{planterId}', [PlanterController::class, 'getPlanterForEdit'])
    ->name('getPlanterForEdit');
Route::post('/editPlanter/{planterId}', [PlanterController::class, 'editPlanter'])
    ->name('editPlanter');



//Plot routes
Route::get('addPlot', [PlotController::class, 'getAddPlot'])
    ->name('getAddPlot');
Route::post('addPlot', [PlotController::class, 'addPlot'])
    ->name('addPlot');
Route::get('editPlot/{plotId}', [PlotController::class, 'getPlotForEdit'])
    ->name('getPlotForEdit');
Route::post('editPlot/{plotId}', [PlotController::class, 'editPlot'])
    ->name('editPlot');
Route::post('deletePlot/{plotId}', [PlotController::class, 'deletePlot'])
    ->name('deletePlot');


//Transaction routes
Route::get('/viewTransactions', [TransactionController::class, 'getTransactions'])
    ->name('viewTransactions');
Route::get('/viewTransaction/{transactionId}', [TransactionController::class, 'getTransaction'])
    ->name('getTransaction');
Route::get('/addTransaction', function() {
    return view('transactions.addTransaction');
})->name('getAddTransaction');
Route::post('/addTransaction', [TransactionController::class, 'addTransaction'])
    ->name('addTransaction');
Route::get('/editTransaction/{transactionId}', [TransactionController::class, 'getTransactionForEdit'])
    ->name('getEditTransaction');
Route::post('/editTransaction/{transactionId}', [TransactionController::class, 'editTransaction'])
    ->name('editTransaction');
Route::post('/deleteTransaction/{transactionId}', [TransactionController::class, 'deleteTransaction'])
    ->name('deleteTransaction');

Route::post('/searchKupovina', [TransactionController::class, 'searchKupovina']);
Route::post('/searchProdaja', [TransactionController::class, 'searchProdaja']);
Route::post('/searchNabava', [TransactionController::class, 'searchNabava']);


Route::get('/get-all-transactions', [TransactionController::class, 'getAllTransaction']);
Route::get('/download-pdf', [TransactionController::class, 'downloadPDF']);