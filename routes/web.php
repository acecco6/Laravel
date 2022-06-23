<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// PRODUCTOS
Route::get("/productos" , [ProductController::class, "index" ])->name("producto.index");
Route::get("/productos/create" , [ProductController::class, "create" ])->name("producto.create");
Route::get("/productos/edit/{id}" , [ProductController::class, "edit" ])->name("producto.edit");
Route::post("/productos" , [ProductController::class, "post" ])->name("producto.post");
Route::put("/productos/{id}" , [ProductController::class, "update" ])->name("producto.update");
// Route::delete("/productos/{id}" , [ProductController::class, "delete" ])->name("producto.delete");

