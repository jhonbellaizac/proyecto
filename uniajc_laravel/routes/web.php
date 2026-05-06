<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Controllers\ConfiguracionController;



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
Route::middleware(['auth'])->group(function () {
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('config.index');
    Route::post('/configuracion', [ConfiguracionController::class, 'update'])->name('config.update');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
 //   return view('dashboard');
 $productos = Producto::all();
 return view('dashboard',compact ('productos'));
})->middleware(['auth', 'verified'])->name('menu');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('productos',ProductoController::class);
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');

require __DIR__.'/auth.php';
