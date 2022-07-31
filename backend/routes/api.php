<?php

use App\Http\Controllers\Api\Auth\PasswordlessController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/passwordless-auth', [PasswordlessController::class, 'send']);
Route::get('/passwordless-auth/verify/{email}/{code}', [PasswordlessController::class, 'verify'])->name('passwordless-auth.verify');
