<?php

use App\Http\Controllers\LandController;
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

Route::get("/list", [LandController::class,"view_lands"]);
Route::get("/list/dimensione-desc", [LandController::class,"view_lands_dimensione_desc"]);
Route::get("/list/dimensione-asc", [LandController::class,"view_lands_dimensione_asc"]);
Route::get("/detail/{id}", [LandController::class,"detail_land"]);
Route::post("/insert", [LandController::class,"insert_land"]);
Route::put("/update/{id}", [LandController::class,"update_land"]);
Route::delete("/delete/{id}", [LandController::class,"delete_land"]);
