<?php

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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']); // index monstar todos os registros no banco de dados
Route::get('/events/create', [EventController::class, 'create']); // create mostrar o formulário de criação
Route::get('/events/{id}', [EventController::class, 'show']); // show mostrar um registro específico
Route::post('/events', [EventController::class, 'store']); // store salvar o registro no banco de dados
Route::delete('/events/{id}', [EventController::class, 'destroy']); // destroy deletar um registro específico
Route::get('/events/edit/{id}', [EventController::class, 'edit']); // edit mostrar o formulário de edição
Route::put('/events/update/{id}', [EventController::class, 'update']); // update salvar as alterações no banco de dados

Route::get('/contato', function () {
    return view('contato');
});
