<?php

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


use App\Http\Controllers\DossierController;

Route::get('/dossiers', [DossierController::class, 'index'])->name('dossiers.index');

Route::get('/dossiers/create', [DossierController::class, 'create'])->name('dossiers.create');
Route::post('/dossiers/store', [DossierController::class, 'store'])->name('dossiers.store');


Route::get('/dossiers/{dossier}/edit', [DossierController::class, 'edit'])->name('dossiers.edit');
Route::put('/dossiers/{dossier}', [DossierController::class, 'update'])->name('dossiers.update');
Route::delete('/dossiers/{dossier}', [DossierController::class, 'destroy'])->name('dossiers.destroy');
