<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DevolucionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//Permiso
//administrador@example.com
//12345678
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UsuarioController::class, 'index'])->name('usuarios.index');
    

    Route::resource('usuarios', UsuarioController::class);
    Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
 
    Route::get('/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos');
    Route::resource('medicamentos', MedicamentoController::class);
    Route::get('medicamentos/create', [MedicamentoController::class, 'create'])->name('medicamentos.create');
    Route::delete('medicamentos/{medicamento}', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy');
    
    
  
    Route::resource('ventas', VentaController::class);

    Route::get('/ventas/{id}', [VentaController::class, 'show'])->name('ventas.show');

    Route::resource('devoluciones', DevolucionController::class);
    Route::get('devoluciones/create', [DevolucionController::class, 'create'])->name('devoluciones.create');

    Route::delete('devoluciones/{devolucion}', [DevolucionController::class, 'destroy'])->name('devoluciones.destroy');


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
