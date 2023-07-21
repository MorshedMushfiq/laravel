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

Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])-> name('student.index');

Route::get('/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');


Route::post('store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');


Route::get('/profile/{id}',[App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
Route::get('/edit_student/{id}',[App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');

Route::get('/trash/{id}',[App\Http\Controllers\StudentController::class, 'goTrash'])->name('student.goTrash');
Route::get('/restore/{id}',[App\Http\Controllers\StudentController::class, 'restore'])->name('student.restore');
Route::get('/forcedelete/{id}',[App\Http\Controllers\StudentController::class, 'forceDelete'])->name('student.force.delete');

Route::get('/trash_students',[App\Http\Controllers\StudentController::class, 'trash'])->name('student.trash');

Route::post('/update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
