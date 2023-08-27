<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EnseignantController;

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
    return view('auth.login1');
});
Route::get('/home', function () {
    return view('index');
});
Route::get('/login1', function () {
    return view('auth.login1');
});

    
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [EleveController::class,'index'])->name('etudiant.index');

    

    Route::post('/classes', [ClasseController::class,'store'])->name('classes.store');
    Route::get('/classes', [ClasseController::class,'index'])->name('classes.index');
    Route::get('/classes/{id}/show', [ClasseController::class,'show'])->name('classes.show');

    Route::get('/etudiants', [EleveController::class,'index'])->name('etudiant.index');
    Route::get('/etudiants/{id}/show', [EleveController::class,'show'])->name('etudiant.show');
    Route::get('/etudiants/{id}/edit', [EleveController::class,'edit'])->name('etudiant.edit');
    Route::post('/etudiants', [EleveController::class,'store'])->name('etudiant.store');
    Route::post('/etudiants/{id}', [EleveController::class,'storeFile'])->name('etudiant.storeFile');
    
    // web.php
    Route::get('/get-classes/{categorieId}', [EleveController::class, 'getClasses']);



    Route::get('/categories', [CategorieController::class,'index'])->name('categories.index');
    Route::post('/categories', [CategorieController::class,'store'])->name('categories.store');




    Route::get('/enseignants', [EnseignantController::class,'index'])->name('enseignants.index');
    Route::get('/enseignants/{id}/show', [EnseignantController::class,'show'])->name('enseignants.show');
    Route::get('/enseignants/{id}/edit', [EnseignantController::class,'edit'])->name('enseignants.edit');
    Route::post('/enseignants', [EnseignantController::class,'store'])->name('enseignants.store');
    Route::post('/enseignants/{id}', [EnseignantController::class,'storeFile'])->name('enseignants.storeFile');
});


