<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DatosUsuarioController;
use App\Http\Controllers\DetallePortafolioController;
use App\Http\Controllers\PortafolioUserController;
use App\Http\Controllers\ResenaUserController;
use App\Http\Controllers\UsuarioController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Aca se protege la ruta mediante un token de autenticacion
// Route::group(['middleware' => 'auth:api'], function () {
//     Route::apiResource('datosUsuarios', DatosUsuarioController::class);
// });

//Aca accdemos a la ruta sin necesidad de tener un token de auntenticacion
Route::apiResource('datosUsuarios', DatosUsuarioController::class);
Route::apiResource('Usuario', UsuarioController::class);
Route::apiResource('PortafolioUser', PortafolioUserController::class);
Route::apiResource('Categorias', CategoriasController::class);
Route::apiResource('DetallePortafolio', DetallePortafolioController::class);
// Route::apiResource('ResenaUser', ResenaUserController::class);
