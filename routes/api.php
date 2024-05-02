<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\KeteranganController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/uploadkomentar', [CommentController::class, 'uploadComments']);
Route::post('/uploadreceive', [ReceiveController::class, 'uploadReceives']);
Route::post('/uploadproduksi', [ProduksiController::class, 'uploadProduksis']);
Route::post('/deleteproduksi', [ProduksiController::class, 'deleteProduksis']);
Route::post('/uploadketerangan', [KeteranganController::class, 'uploadKeterangan']);
Route::post('/deleteketerangan', [KeteranganController::class, 'deleteKeterangans']);
Route::post('/createreceive', [ReceiveController::class, 'createReceive']);

