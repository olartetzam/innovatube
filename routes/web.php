<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/', [Login::class, 'index'])->name('inicio');
Route::get('login', [Login::class, 'index'])->name('inicio');
Route::get('inicio', [Login::class, 'login'])->name('login');

Route::get('registro', [Login::class, 'registro'])->name('login.registro');
Route::post('registro-nuevo', [Login::class, 'registro_add'])->name('login.registro.add');

Route::get('olvido-password',[Login::class, 'olvido_password'])->name('login.olvido');
Route::get('reset-password', [Login::class, 'reset_password'])->name('login.reset');
Route::get('cambiar-password',[Login::class, 'cambiar_password'])->name('login.cambio');

Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::get('dashboard', [Home::class, 'index'])->name('home.index');
    Route::get('favoritos', [Home::class, 'favoritos'])->name('home.favoritos');

    Route::get('editar-usuario', [Login::class, 'editar'])->name('editar.usuario');
    Route::put('update', [Login::class, 'update'])->name('update');
    Route::get('logout',[Login::class, 'logout'])->name('logout');

    Route::get('/todo-favorito',[Home::class, 'todos_favoritos']);
    Route::post('/add-favorito',[Home::class, 'add_favorito']);
    Route::delete('/delete-favorito',[Home::class, 'delete_favorito']);

});