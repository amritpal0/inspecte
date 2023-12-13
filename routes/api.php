<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;

use App\Http\Controllers\AdminController;

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


//Dashboard
Route::get('/dashboard', [ApiController::class, 'dashboard']);


//-----login-------//
Route::post('/send-otp', [ApiController::class, 'send_otp']);
Route::post('/verify-otp', [ApiController::class, 'verify_otp']);

//single product
Route::get('/product/{slug}', [ApiController::class, 'single_product']);