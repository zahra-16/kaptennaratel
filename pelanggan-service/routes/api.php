<?php

use App\Http\Controllers\Api\PelangganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

// RESTful route untuk resource pelanggan
Route::apiResource('pelanggan', PelangganController::class);

// Route ke unit-service (GET all units)
Route::get('/external/units', function () {
    $response = Http::get('http://localhost:8001/api/units');
    
    return response()->json($response->json(), $response->status());
});

// Route ke harga-paket-service (GET all harga paket)
Route::get('/external/harga-paket', function () {
    $response = Http::get('http://localhost:8002/api/ref-harga-paket');

    return response()->json($response->json(), $response->status());
});

// Route default untuk auth user (jika pakai Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
