<?php

use App\Http\Controllers\Api\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('news', [NewsController::class, 'index'])->name('news');
Route::post('news', [NewsController::class, 'storeNews'])->name('store-news');
Route::put('news/{id}', [NewsController::class, 'updateNews'])->name('update-news');
Route::delete('news/{id}', [NewsController::class, 'deleteNews'])->name('delete-news');

Route::get('news/{id}', [NewsController::class, 'detail'])->name('detail');
