<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MusicianController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\CustomerController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function ($router) {
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::post('/refresh', [AuthController::class, 'refresh']);
//     Route::get('/user-profile', [AuthController::class, 'userProfile']);  
    
// });

Route::post('/login-user', [AuthController::class, 'login']);
Route::post('/register-user', [AuthController::class, 'register']);
Route::post('/logout-user', [AuthController::class, 'logout']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::get('/user-profile', [AuthController::class, 'userProfile']);  

Route::post('/login', [CustomerController::class, 'login']);
Route::post('/register', [CustomerController::class, 'register']);
Route::post('/logout', [CustomerController::class, 'logout']);
Route::post('/refresh', [CustomerController::class, 'refresh']);
// Route::get('/user-profile', [CustomerController::class, 'userProfile']);  


// Auth::routes(['verify' => true]);
Route::group(['middleware' => 'jwt.verify'], function()
{
    Route::get('/all-user',[UserController::class,'show']);
    Route::put('/update-user/{id}', [UserController::class, 'update']);    
    Route::delete('/delete-user/{id}', [UserController::class, 'delete']);    
    
    Route::get('/all-musician',[MusicianController::class,'show']);
    Route::post('/create-musician', [MusicianController::class, 'create']);    
    Route::put('/update-musician/{id}', [MusicianController::class, 'update']);    
    Route::delete('/delete-musician/{id}', [MusicianController::class, 'delete']);   
    
    Route::get('/all-musician-album',[AlbumController::class,'show']);
    Route::post('/create-album', [AlbumController::class, 'create']);    
    Route::put('/update-album/{id}', [AlbumController::class, 'update']);    
    Route::delete('/delete-album/{id}', [AlbumController::class, 'delete']);   
    
    Route::get('/all-music',[MusicController::class,'show']);
    Route::post('/create-music', [MusicController::class, 'create']);    
    Route::put('/update-music/{id}', [MusicController::class, 'update']);    
    Route::delete('/delete-music/{id}', [MusicController::class, 'delete']);   
    
});

