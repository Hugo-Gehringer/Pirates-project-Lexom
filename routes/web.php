<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\TreasureController;
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
    return view('welcome');
});
Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/ressources', [RessourceController::class, 'index']);

Route::get('/ressources/fromShip/{ship:id}',  [RessourceController::class, 'showRessourcesFromShip']);

Route::get('/ressources/create/{ship:id?}', [RessourceController::class, 'create'])->name('ressources.create');
Route::get('/ressources/edit/{ressource:id?}', [RessourceController::class, 'edit'])->name('ressources.edit');
Route::get('/ressources/edit/cook/{ressource:id?}', [RessourceController::class, 'cookEdit'])->name('ressources.edit.cook');
Route::post('/ressources/store', [RessourceController::class, 'store'])->name('ressources.store');;
Route::patch('/ressources/update/{ressource:id?}', [RessourceController::class, 'update'])->name('ressources.update');;
Route::delete('/ressources/delete/{ressource:id?}', [RessourceController::class, 'destroy'])->name('ressources.destroy');;

Route::get('/treasures/create/{ship:id?}', [TreasureController::class, 'create'])->name('treasures.create');
Route::get('/treasures/edit/{treasure:id?}', [TreasureController::class, 'edit'])->name('treasures.edit');
Route::get('/treasures/edit/captain/{treasure:id?}', [TreasureController::class, 'captainEdit'])->name('treasures.edit.captain');
Route::post('/treasures/store', [TreasureController::class, 'store'])->name('treasures.store');;
Route::patch('/treasures/update/{treasure:id?}', [TreasureController::class, 'update'])->name('treasures.update');;
Route::delete('/treasures/delete/{treasure:id?}', [TreasureController::class, 'destroy'])->name('treasures.destroy');;

Route::get('/ship/create', [ShipController::class, 'create'])->name('ship.create');
Route::get('/ship/edit/{ship:id?}', [ShipController::class, 'edit'])->name('ship.edit');
Route::post('/ship/store', [ShipController::class, 'store'])->name('ship.store');;
Route::post('/ship/update', [ShipController::class, 'update'])->name('ship.update');;

Auth::routes();

Route::get('/register/form', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('showRegistrationForm');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
