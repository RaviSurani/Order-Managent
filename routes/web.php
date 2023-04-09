<?php

use App\Http\Controllers\CategoryMasterController;
use App\Http\Controllers\ItemMasterController;
use App\Http\Controllers\OrderMasterController;
use App\Http\Controllers\ProjectMasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\ItemMasterController::class, 'index'])->name('home');

// Route::resource("item", itemController::class);


Route::get('categorys', [CategoryMasterController::class, 'index']);
Route::get('categorys/create', [CategoryMasterController::class, 'create']);
Route::post('categorys', [CategoryMasterController::class, 'store']);
Route::get('categorys/{categoryMaster}/edit', [CategoryMasterController::class, 'edit']);
Route::post('categorys/{categoryMaster}/update', [CategoryMasterController::class, 'update']);
Route::post('categorys/{categoryMaster}/delete', [CategoryMasterController::class, 'destroy']);


Route::get('project', [ProjectMasterController::class, 'index']);
Route::get('project/create', [ProjectMasterController::class, 'create']);
Route::post('project', [ProjectMasterController::class, 'store']);
Route::get('project/{projectMaster}/edit', [ProjectMasterController::class, 'edit']);
Route::post('project/{projectMaster}/update', [ProjectMasterController::class, 'update']);
Route::post('project/{projectMaster}/delete', [ProjectMasterController::class, 'destroy']);


Route::get('item', [ItemMasterController::class, 'index']);
Route::get('item/create', [ItemMasterController::class, 'create']);
Route::post('item', [ItemMasterController::class, 'store']);
Route::get('item/{itemMaster}/edit', [ItemMasterController::class, 'edit']);
Route::post('item/{itemMaster}/update', [ItemMasterController::class, 'update']);
Route::post('item/{itemMaster}/delete', [ItemMasterController::class, 'destroy']);

Route::get('order', [OrderMasterController::class, 'index']);
Route::get('order/create', [OrderMasterController::class, 'create']);
Route::post('order', [OrderMasterController::class, 'store']);
Route::get('order/{orderMaster}/edit', [OrderMasterController::class, 'edit']);
Route::post('order/{orderMaster}/update', [OrderMasterController::class, 'update']);
Route::post('order/{orderMaster}/delete', [OrderMasterController::class, 'destroy']);
