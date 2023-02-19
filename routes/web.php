<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

//Home
Route::get('/',[HomeController::class,'index']) -> name('home');

//Student
Route::prefix('/todo')->group(function(){
    Route::get('/',[StudentController::class,'index']) -> name('student'); //load to index file
    Route::post('/store',[StudentController::class,'store']) -> name('student.store'); //save a student

});


