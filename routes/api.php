<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FeedbackController;
use App\Http\Controllers\RekomendasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/get-data', [RekomendasiController::class, 'getData']);

Route::post('/cbf', function (Request $request) {
    // Mendapatkan data dari form Laravel
    $formData = $request->all();

    // Mengirim data ke Flask
    $response = Http::post('http://127.0.0.1:5000/cbf', $formData);

    dd($response);

    // Mengembalikan respons dari Flask
    return $response->json();
});
