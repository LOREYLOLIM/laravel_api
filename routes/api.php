<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\dummyApi;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
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

Route::get("data", [dummyApi::class, "getData"]);

// best option

Route::get("list/{id?}", [DeviceController::class, "list"]);

// Route::get("list/", [DeviceController::class, "list"]);
// Route::get("list/{id}", [DeviceController::class, "listparams"]);


// //not secured


// Route::post("add", [DeviceController::class, "add"]);

// Route::put("update", [DeviceController::class, "update"]);

// Route::get("search/{name}", [DeviceController::class, "search"]);

// Route::delete("delete/{id}", [DeviceController::class, "delete"]);

// Route::post("save", [DeviceController::class, "testData"]);

// Route::apiResource("member", MemberController::class);

Route::post("login", [UserController::class, "login"]);

// secured mode
Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::apiResource("member", MemberController::class);

    Route::post("add", [DeviceController::class, "add"]);

    Route::put("update", [DeviceController::class, "update"]);

    Route::get("search/{name}", [DeviceController::class, "search"]);

    Route::delete("delete/{id}", [DeviceController::class, "delete"]);

    Route::post("save", [DeviceController::class, "testData"]);

    Route::apiResource("member", MemberController::class);

});

Route::post("upload", [FileController::class, "upload"]);
