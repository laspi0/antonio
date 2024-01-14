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

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\UserController;

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);



use App\Http\Controllers\BilletController;

Route::get('/billets', [BilletController::class, 'index'])->name('billets.index');
Route::get('/reservation', [BilletController::class, 'create'])->name('billets.create');
Route::post('/reservation', [BilletController::class, 'store'])->name('billets.store');
Route::get('/billets/{id}', [BilletController::class, 'show'])->name('billets.show');
Route::delete('/billets/{id}', [BilletController::class, 'destroy'])->name('billets.destroy');



Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

