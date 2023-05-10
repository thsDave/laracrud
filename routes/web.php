<?php

use App\Http\Controllers\CrudController;

use Illuminate\Support\Facades\Route;

// Principal
Route::get('/', [CrudController::class, "index"])->name("crud.index");

// Ruta para añadir un nuevo registro
Route::post('new', [CrudController::class, "create"])->name("crud.create");

// Ruta para editar un registro
Route::post('update', [CrudController::class, "update"])->name("crud.update");

// Ruta para eliminar un registro
Route::get('/delete/{id}', [CrudController::class, "delete"])->name("crud.delete");