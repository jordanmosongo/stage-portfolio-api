<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SocialNetworkController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubscriberController;

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
    Route::get('/{id}', [VisitorController::class, 'show']);
    Route::delete('/{id}', [VisitorController::class, 'destroy']);
    }
);

/**
 * Manage routes for address
 */

Route::prefix('/address')->group( function () {
    Route::get('/{id}', [AddressController::class, 'show']);
    Route::post('/store', [AddressController::class, 'store']);
    Route::put('/{id}', [AddressController::class, 'update']);
  }
);

/**
 * Manage routes for developer
 */
Route::get('/developers', [DeveloperController::class, 'index']);
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
    Route::post('/store/{developer_id}', [TechnologyController::class, 'store']);
    Route::put('/{id}', [TechnologyController::class, 'update']);
    Route::delete('/{id}', [TechnologyController::class, 'destroy']);
}
);

/**
 * Manage routes for project
 */

Route::get('/projects', [ProjectController::class, 'index']);
Route::prefix('/project')->group( function () {
    Route::get('/{id}', [ProjectController::class, 'show']);
    Route::post('/store', [ProjectController::class, 'store']);
    Route::put('/{id}', [ProjectController::class, 'update']);
    Route::delete('/{id}', [ProjectController::class, 'destroy']);
}
);

/**
 * Manage routes for social network
 */

Route::get('/socialnetworks', [SocialNetworkController::class, 'index']);
Route::prefix('/socialnetwork')->group( function () {
    Route::get('/{id}', [SocialNetworkController::class, 'show']);
    Route::post('/store/{developer_id}', [SocialNetworkController::class, 'store']);
    Route::put('/{id}', [SocialNetworkController::class, 'update']);
    Route::delete('/{id}', [SocialNetworkController::class, 'destroy']);
}
);

/**
 * Manage routes for messages
 */

Route::get('/messages', [MessageController::class, 'index']);
Route::prefix('/message')->group( function () {
    //Route::get('/{id}', [MessageController::class, 'show']);
    Route::post('/store/{developer_id}', [MessageController::class, 'store']);
    //Route::delete('/{id}', [MessageController::class, 'destroy']);
}
);

/**
 * Manage routes for visitor
 */

Route::get('/visitors', [VisitorController::class, 'index']);
Route::prefix('/visitor')->group( function () {
    Route::get('/{id}', [VisitorController::class, 'show']);
    //Route::delete('/{id}', [VisitorController::class, 'destroy']);
}
);

/**
 * Manage routes for subscriber
 */

Route::get('/subscribers', [SubscriberController::class, 'index']);
Route::prefix('/subscriber')->group( function () {
    //Route::get('/{id}', [SubscriberController::class, 'show']);
    Route::post('/store/{developer_id}', [SubscriberController::class, 'store']);
    //Route::delete('/{id}', [SubscriberController::class, 'destroy']);
}
);



