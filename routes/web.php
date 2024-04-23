<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriaController;

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

Route::get('/',[GaleriaController::class,'index'])->name('home.sections');

Route::get('/admin', function () {
    return view('auth.login'); // Ahora /admin mostrará la vista de login
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   /*  Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard'); */
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    /* Route::get('/dashboard/galeria',[FotoController::class,'index'])->name('galeria'); */
    Route::resource('/dashboard/galeria', FotoController::class);
    
    

});
