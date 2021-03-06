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
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('allMovies', [MovieController::class,'indexAll']);
Route::get('movies', [MovieController::class,'index']);
Route::get('moviesPages', [MovieController::class,'getPageNumbers']);
Route::get('movies/{movie}', [MovieController::class,'show']);
Route::get('movies/images/{image}', [MovieImageController::class,'show']);
Route::get('movies/search/{title}', [MovieController::class,'search']);
Route::post('movies', [MovieController::class,'store']);
Route::post('movies/{movie}', [MovieController::class,'update']);
Route::delete('movies/{movie}', [MovieController::class,'destroy']);


Route::get('allPrograms', [ProgramController::class,'indexAll']);
Route::get('programsPages', [ProgramController::class,'getPageNumbers']);
Route::get('programs', [ProgramController::class,'index']);
Route::get('programs/{program}', [ProgramController::class,'show']);
Route::get('programs/images/{image}', [ProgramImageController::class,'show']);
Route::get('programs/search/{title}', [ProgramController::class,'search']);
Route::post('programs', [ProgramController::class,'store']);
Route::post('programs/{program}', [ProgramController::class,'update']);
Route::delete('programs/{program}', [ProgramController::class,'destroy']);


