<?php

use App\Http\Controllers\AccountHeadController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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
Route::resource('trans',TransactionController::class);
Route::resource('head',AccountHeadController::class);
Route::resource('group',GroupController::class);
