<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\LoginController;
use App\Http\Controllers\api\v1\RegisterController;
//use App\Http\Controllers\api\v1\UserController; //Käyttöön jos halutaan storeen käyttäjän tiedot
use App\Http\Controllers\ItemController;

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



//Login ja Register reitit
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);


Route::prefix('/application')->group( function() {

    #Reitti jos halutaan kirjautuneen käyttäjän tiedot, voidaan käyttää jos on tarvetta
    //Route::get('/current', [UserController::Class, 'currentUser']);
    
    #Hakee tehtävät
    Route::middleware('auth:api')->get('/items', [ItemController::class, 'index']);
    
    #Tallennetaan tehtävä
    Route::middleware('auth:api')->post('/store', [ItemController::class, 'store']);

    #Muokataan tehtävää
    Route::middleware('auth:api')->put('/{id}', [ItemController::class, 'update']);

    #Poistetaan tehtävä
    Route::middleware('auth:api')->delete('/{id}', [ItemController::class, 'destroy']);
});