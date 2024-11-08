<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalentNeedController;
use App\Http\Controllers\DepartmentController;


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


Route::get('talent_needs', [TalentNeedController::class, 'index'])->name('talent_needs.index');
Route::get('talent_needs/create', [TalentNeedController::class, 'create'])->name('talent_needs.create');
Route::post('talent_needs', [TalentNeedController::class, 'store'])->name('talent_needs.store');
Route::get('talent_needs/{id}/edit', [TalentNeedController::class, 'edit'])->name('talent_needs.edit');
Route::put('talent_needs/{id}', [TalentNeedController::class, 'update'])->name('talent_needs.update');
Route::delete('talent_needs/{id}', [TalentNeedController::class, 'destroy'])->name('talent_needs.destroy');

Route::resource('departments', DepartmentController::class);