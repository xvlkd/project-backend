<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProblemRecordController;
use App\Http\Controllers\KeluhanNasabahController;
use App\Http\Controllers\AktivasiATMController;
use App\Http\Controllers\RelasiRekMencurigakanController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/


//LoginLOgout
Route::post('login', 'UserController@login');
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('logoutall', [UserController::class, 'logoutall']);

    //ProblemRecord
    Route::get('/problems', [ProblemRecordController::class, 'index']);
    Route::post('/problems', [ProblemRecordController::class, 'tambah']);
    Route::post('/problems/{id_problemrecord}', [ProblemRecordController::class, 'edit']);
    Route::delete('/problems/delete/{id_problemrecord}', [ProblemRecordController::class, 'hapus']);

    //KeluhanNasabah
    Route::get('/keluhan', [KeluhanNasabahController::class, 'index']);
    Route::post('/keluhan', [KeluhanNasabahController::class, 'tambah']);
    Route::post('/keluhan/{id_keluhan}', [KeluhanNasabahController::class, 'edit']);
    Route::delete('/problems/delete/{id_keluhan}', [KeluhanNasabahController::class, 'hapus']);

    //AktivasiATM
    Route::get('/aktivasi', [AktivasiATMController::class, 'index']);
    Route::post('/aktivasi', [AktivasiATMController::class, 'tambah']);
    Route::post('/aktivasi/{id_aktivasi}', [AktivasiATMController::class, 'edit']);
    Route::delete('/aktivasi/{id_aktivasi}', [AktivasiATMController::class, 'hapus']);

    //RelasiRekMencurigakan
    Route::get('/relasirek', [RelasiRekMencurigakanController::class, 'index']);
    Route::post('/relasirek', [RelasiRekMencurigakanController::class, 'tambah']);
    Route::post('/relasirek/{id_relasi}', [RelasiRekMencurigakanController::class, 'edit']);
    Route::delete('/relasirek/delete/{id_rek}', [RelasiRekMencurigakanController::class, 'hapus']);

    //CallCenterLog
});
