<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortafolioController;

// Route::get('/', function () {
// return view('welcome');
// });




Route::middleware('auth')->resource('/catalogos', App\Http\Controllers\CatalogoController::class);


//Route::resource('/catalogos', App\Http\Controllers\CatalogoController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inicio', function () {
    $catalogos = App\Models\Catalogo::all(); // Obtienes todos los catálogos
    return view('welcome', compact('catalogos')); // Pasas la variable $catalogos a la vista
})->middleware(['auth', 'verified'])->name('inicio');

// Route::get('/inicio', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('inicio');

// Ruta para la URL raíz, manejada por el controlador PortafolioController
Route::get('/', [PortafolioController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('inicio');















Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});




require __DIR__.'/auth.php';
