<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
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
Route::get('/home', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
});
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('dashboard',[EmployeeController::class,'show'])->middleware('auth');
Route::post('add',[EmployeeController::class,'add']);
Route::get('show/{id}',[EmployeeController::class,'show_id']);
Route::put('update',[EmployeeController::class,'update']);
Route::delete('delete/{id}',[EmployeeController::class,'delete']);
