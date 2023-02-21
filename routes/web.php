<?php

use App\Http\Controllers\familyController;
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

Route::get('/', function () {
    return redirect()->route('family.index');
});

Route::prefix('family')->name('family.')->group(function () {
    Route::get('query', [familyController::class, 'listquery'])->name('query');
    Route::get('chart', [familyController::class, 'chart'])->name('chart');
});
Route::resource('family', familyController::class);
