<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(App\Http\Controllers\NoticiaController::class)->group(function () {
    Route::get('/noticias', 'index')->middleware(['auth', 'verified'])->name('index');
    Route::get('/cadastrar-noticia', 'create')->middleware(['auth', 'verified'])->name('cadastrar-noticia');
    Route::post('/cadastrar-noticia', 'store')->middleware(['auth', 'verified'])->name('cadastrar-noticia');
    Route::get('/editar-noticia/{id_noticia}', 'edit')->middleware(['auth', 'verified'])->name('editar-noticia');
    Route::put('/editar-noticia/{id_noticia}', 'update')->middleware(['auth', 'verified'])->name('editar-noticia');
    Route::delete('/deletar-noticia/{id_noticia}', 'destroy')->middleware(['auth', 'verified'])->name('deletar-noticia');
});