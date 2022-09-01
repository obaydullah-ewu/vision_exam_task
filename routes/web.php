<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::post('store', [StudentController::class, 'store'])->name('store');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [StudentController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [StudentController::class, 'delete'])->name('delete');

    Route::get('add-course-mark/{student_mark}', [StudentController::class, 'addCourseMark'])->name('addCourseMark');
    Route::post('store-course-mark/{student_id}', [StudentController::class, 'storeCourseMark'])->name('storeCourseMark');
});

