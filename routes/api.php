<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\MovieImageController;

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
Route::get('movies', [MovieController::class,'index']);
Route::get('movies/{movie}', [MovieController::class,'show']);
Route::get('movies/images/{image}', [MovieImageController::class,'show']);
Route::get('movies/search/{title}', [MovieController::class,'search']);

Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('movies', [MovieController::class,'store']);
    Route::put('movies/{movie}', [MovieController::class,'update']);
    Route::delete('movies/{movie}', [MovieController::class,'destroy']);
});

// Route::resource('movies', MovieController::class);

Route::resource('programs', ProgramController::class);


