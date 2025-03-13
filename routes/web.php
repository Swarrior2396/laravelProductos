<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\EntradaController;

Route::resource('productos', ProductoController::class);

// Rutas adicionales para productos eliminados (Papelera)

Route::get('productos-trashed',[ProductoController::class,'trashed'])->name('productos.trashed');
Route::patch('produtos/restore/{id}',[ProductoController::class,'restore'])->name('productos.restore');
Route::patch('produtos/{id}/force-delete',[ProductoController::class,'forceDelete'])->name('productos.force-delete');

/*
Route::prefix('productos')->name('productos.')->group(function () {
    Route::get('/trashed', [ProductoController::class, 'trash'])->name('productos.trashed');
    Route::post('/restore/{id}', [ProductoController::class, 'restore'])->name('productos.restore');
    Route::delete('/force-delete/{id}', [ProductoController::class, 'forceDelete'])->name('productos.forceDelete');
});*/

Route::resource('proveedores', ProveedorController::class);
/*
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores/{nit}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{nit}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{nit}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

Route::get('/proveedores/trash', [ProveedorController::class, 'trash'])->name('proveedores.trash');
Route::post('/proveedores/{nit}/restore', [ProveedorController::class, 'restore'])->name('proveedores.restore');
Route::delete('/proveedores/{nit}/forceDelete', [ProveedorController::class, 'forceDelete'])->name('proveedores.forceDelete');

*/
Route::resource('clientes', ClienteController::class);
Route::resource('salidas', SalidaController::class);
Route::resource('entradas', EntradaController::class);
Route::get('entradas/trashed', [EntradaController::class, 'trashed'])->name('entradas.trashed');
Route::patch('entradas/{id}/restore', [EntradaController::class, 'restore'])->name('entradas.restore');
Route::delete('entradas/{id}/force-delete', [EntradaController::class, 'forceDelete'])->name('entradas.forceDelete');

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
    return redirect()->route('productos.index'); 
});
