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



Route::get('/e', function () {
    echo 'heelo';
});

Route::middleware('auth')->group(function(){


    Route::resource('/employe',EmployeController::class);
    Route::resource('/task',TaskController::class);
    Route::view('/', 'dashboard')->name('dashboard');
     Route::get('/employe/suspspend/{id}/{status}',[EmployeController::class,'suspendedEmploye'] )->name('employe.suspendedEmp');

});

require __DIR__.'/auth.php';
