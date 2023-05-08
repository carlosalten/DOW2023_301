<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\JugadoresController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/login',[HomeController::class,'login'])->name('home.login');

Route::get('/equipos',[EquiposController::class,'index'])->name('equipos.index');
Route::get('/equipos/{equipo}',[EquiposController::class,'show'])->name('equipos.show');
Route::get('/equipos/{equipo}/edit',[EquiposController::class,'edit'])->name('equipos.edit');

Route::get('/jugadores',[JugadoresController::class,'index'])->name('jugadores.index');
Route::get('/jugadores/create',[JugadoresController::class,'create'])->name('jugadores.create');
Route::post('/jugadores',[JugadoresController::class,'store'])->name('jugadores.store');