<?php

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
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/do_login', [App\Http\Controllers\LoginController::class, 'do_login'])->name('do_login');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/', function(){
    return view('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin', function () {
        return view('dashboard');
    });

    include 'admin/user.php';
    include 'admin/attendance.php';
});

