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
Route::prefix('/student')->group(function(){
    Route::get('/',[StudentController::class,'index']) -> name('student'); //load to index file
    Route::post('/store',[StudentController::class,'store']) -> name('student.store'); //save a student
    Route::post('/{task_id}/update',[StudentController::class,'update']) -> name('student.update'); //update a student
    Route::get('/edit',[StudentController::class,'edit']) -> name('student.edit'); //edit a student
    Route::get('/{task_id}/delete',[StudentController::class,'delete']) -> name('student.delete'); //delete a student
    Route::get('/{task_id}/status',[StudentController::class,'status']) -> name('student.status'); //change status


});



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
