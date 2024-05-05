<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CitaController;
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
Route::get('/home.cancelaCita/{token}', [CitaController::class, 'cancelarCita'])->name('cancelar-cita');
Route::post('/obtener-horas-disponibles', [GaleriaController::class, 'generarRangoHoras'])->name('obtener.horas.disponibles');
Route::post('/',  [CitaController::class, 'guardarCita'])->name('guardar.cita');


Route::get('/admin', function () {
    return view('auth.login'); 
})->name('admin');

Route::get('/home.cancelaCita', function () {
    return view('home.cancelaCita'); 
})->name('cancelaCita');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   /*  Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard'); */
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/dashboard/citas', CitaController::class);
    Route::resource('/dashboard/horario',HorarioController::class);
    Route::resource('/dashboard/servicios',ServicioController::class);
    Route::resource('/dashboard/galeria', FotoController::class);
    
    

});
