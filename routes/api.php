<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\MovieImageController;
use App\Http\Controllers\ProgramImageController;
use App\Http\Controllers\AuthController;


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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('movies', [MovieController::class,'index']);
Route::get('movies/{movie}', [MovieController::class,'show']);
Route::get('movies/images/{image}', [MovieImageController::class,'show']);
Route::get('movies/search/{title}', [MovieController::class,'search']);
Route::get('programs', [MovieController::class,'index']);
Route::get('programs/{program}', [ProgramController::class,'show']);
Route::get('programs/images/{image}', [ProgramImageController::class,'show']);
Route::get('programs/search/{title}', [ProgramController::class,'search']);

Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('movies', [MovieController::class,'store']);
    Route::put('movies/{movie}', [MovieController::class,'update']);
    Route::delete('movies/{movie}', [MovieController::class,'destroy']);
    Route::post('programs', [ProgramController::class,'store']);
    Route::put('programs/{program}', [ProgramController::class,'update']);
    Route::delete('programs/{program}', [ProgramController::class,'destroy']);
});

