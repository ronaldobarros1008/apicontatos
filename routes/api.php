<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ======================================================================================

//Route::get('/status', 'Api\ContatoController@status');


use App\Http\Controllers\Api\ContatoController;

Route::get('/status', [ContatoController::class, 'status']);
//Route::post('/contatos/add', [ContatoController::class, 'add']);


Route::namespace('Api')->group( function() {
    Route::post('/contatos/add', [ContatoController::class, 'add']);
    Route::get('/contatos', [ContatoController::class, 'list']);
    Route::get('/contatos/{id}', [ContatoController::class, 'select']);
    Route::put('/contatos/{id}', [ContatoController::class, 'update']);
    Route::delete('/contatos/{id}', [ContatoController::class, 'delete']);
});
