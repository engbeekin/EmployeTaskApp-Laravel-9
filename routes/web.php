<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('auth.login');
// });




Route::middleware('auth')->group(function(){

    Route::view('/', 'dashboard')->name('dashboard');
    Route::resource('/task',TaskController::class)->only('create','store');
    Route::resource('/employe',EmployeController::class);
    Route::view('/test','layouts.mainlayout');
});

require __DIR__.'/auth.php';
