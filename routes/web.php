<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

// Rota para a Home
Route::get('/',[BookController::class, 'index']);

// Rota para pagina para adicionar um novo livro
Route::get('/adicionar', [BookController::class, 'create']);

// Rota para salvar o livro
Route::post('/adicionar',[BookController::class, 'store']);

// Rota para deletar o livro
Route::delete('/delete',[BookController::class, 'destroy']);