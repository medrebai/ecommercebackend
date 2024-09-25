<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Models\Scategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('api')->group(function () {
Route::resource('categories', CategorieController::class);
});
Route::middleware('api')->group(function () {
Route::resource('scategories', ScategorieController::class);
});
// Route::get("/categories", [CategorieController::class,"index"]);
// Route::post("/categories", [CategorieController::class,"store"]);
// Route::get("/categories/{id}", [CategorieController::class,"show"]);
// Route::put("/categories/{id}", [CategorieController::class,"update"]);
// Route::delete("/categories/{id}", [CategorieController::class,"destroy"]);
