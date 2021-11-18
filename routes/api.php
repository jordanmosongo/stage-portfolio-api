<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\TechnologyController;

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

/**
 * Manage routes for visitor
 */

Route::get('/visitors', [VisitorController::class, 'index'] );
Route::prefix('/visitor')->group( function () {
    Route::post('/store', [VisitorController::class, 'store']);
    Route::put('/{id}', [VisitorController::class, 'update']);
    Route::delete('/{id}', [VisitorController::class, 'destroy']);
    }
);

/**
 * Manage routes for address
 */

Route::get('/addresses', [AddressController::class, 'index']);
Route::prefix('/address')->group( function () {
    Route::post('/store', [AddressController::class, 'store']);
    Route::put('/{id}', [AddressController::class, 'update']);
    Route::delete('/{id}', [AddressController::class, 'destroy']);
    }
);

/**
 * Manage routes for developer
 */

Route::prefix('/developer')->group( function () {
    Route::get('/{id}', [DeveloperController::class, 'show']);
    Route::post('/store', [DeveloperController::class, 'store']);
    Route::put('/{id}', [DeveloperController::class, 'update']);
    }
);

/**
 * Manage routes for technology
 */

Route::get('/technologies', [TechnologyController::class, 'index']);
Route::prefix('/technology')->group( function () {
    Route::get('/{id}', [TechnologyController::class, 'show']);
    Route::post('/store', [TechnologyController::class, 'store']);
    Route::put('/{id}', [TechnologyController::class, 'update']);
    Route::delete('/{id}', [TechnologyController::class, 'destroy']);
}
);



