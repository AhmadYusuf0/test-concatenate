<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test1Controller;
use App\Http\Controllers\Test2Controller;
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

Route::prefix('test_1')->group(function(){
    Route::get('/', [Test1Controller::class, 'index'])->name('test1.index');
    Route::post('action', [Test1Controller::class, 'action'])->name('test1.action');
});

Route::prefix('test_2')->group(function(){
    Route::get('/', [Test2Controller::class, 'index'])->name('test2.index');
    Route::get('/city/{id}', [Test2Controller::class, 'getCity'])->name('test2.city');
    Route::post('action', [Test2Controller::class, 'action'])->name('test2.action');
});
