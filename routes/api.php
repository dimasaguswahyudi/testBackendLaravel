<?php

use App\Http\Controllers\API\familyController;
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

Route::get('family', [familyController::class, 'index']);
Route::get('family/anak', [familyController::class, 'anak']);
Route::get('family/cucuPerempuan', [familyController::class, 'cucuPerempuan']);
Route::get('family/cucuLaki', [familyController::class, 'cucuLaki']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
