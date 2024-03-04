<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
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
//category
Route::get('/', [CategoryController::class,'listPage'])->name('list#page');
Route::get('createPage',[CategoryController::class,'createPage'])->name('create#categoryPage');
Route::post('createCategory',[CategoryController::class,'create'])->name('create#category');
Route::get('delete/{id}',[CategoryController::class,'delete'])->name('delete#category');
Route::get('updatePage/{id}',[CategoryController::class,'updatePage'])->name('update#page');
Route::post('update',[CategoryController::class,'update'])->name('update#category');


//movie
Route::prefix('movie')->group(function(){
    Route::get('list',[MovieController::class,'listPage'])->name('movie#listPage');
    Route::get('viewPage/{id}',[MovieController::class,'viewPage'])->name('view#page');
    Route::get('createPage',[MovieController::class,'createPage'])->name('movie#createPage');
    Route::Post('create',[MovieController::class,'create'])->name('create#movie');
    Route::get('delete/{id}',[MovieController::class,'delete'])->name('delete#movie');
    Route::get('edit/{id}',[MovieController::class,'edit'])->name('edit#movie');
    Route::post('update',[MovieController::class,'update'])->name('update#movie');
});

