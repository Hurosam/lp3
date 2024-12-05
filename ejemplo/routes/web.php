<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ProgramaController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaisController;

Route::get('/', function () {
    return view('auth/login');
});

Route::get("pais/mostrar/{pais}", [PaisController::class, "mostrar"]);
Route::get("profesor/mostrar", [ProfesorController::class, "mostrar"]);
Route::get("profesor/crear", [ProfesorController::class, "crear"])->Middleware("auth");
Route::post("profesor/guardar", [ProfesorController::class, "guardar"]);
Route::get("profesor/modificar/{id}", [ProfesorController::class, "modificar"]);
Route::post("profesor/actualizar/{id}", [ProfesorController::class, "actualizar"]);
Route::get("profesor/eliminar/{id}", [ProfesorController::class, "eliminar"]);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("profesor/mostrar2", [ProfesorController::class, "mostrar2"]);
Route::apiResource("programa", ProgramaController::class);
