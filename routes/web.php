<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PagesController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\SetupController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\AttendanceController;

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


Route::group(['prefix' => '/'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

require __DIR__.'/auth.php';

Route::group(['prefix' => '/admin'], function(){
    Route::get('/dashboard', [PagesController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
   
    Route::group(['prefix' => '/setup'], function(){
        Route::get('/semester/manage', [SetupController::class, 'semester_manage'])->middleware(['auth', 'verified'])->name('semester.manage');
        Route::post('/semester/store', [SetupController::class, 'semester_store'])->middleware(['auth', 'verified'])->name('semester.store');
        Route::post('/semester/update/{id}', [SetupController::class, 'semester_update'])->middleware(['auth', 'verified'])->name('semester.update');
        Route::post('/semester/delete/{id}', [SetupController::class, 'semester_delete'])->middleware(['auth', 'verified'])->name('semester.delete');

        //Course
        Route::get('/course/manage', [SetupController::class, 'course_manage'])->middleware(['auth', 'verified'])->name('course.manage');
        Route::post('/course/store', [SetupController::class, 'course_store'])->middleware(['auth', 'verified'])->name('course.store');
        Route::post('/course/update/{id}', [SetupController::class, 'course_update'])->middleware(['auth', 'verified'])->name('course.update');
        Route::post('/course/delete/{id}', [SetupController::class, 'course_delete'])->middleware(['auth', 'verified'])->name('course.delete');

        //Student Route
        Route::get('/student/manage/{id}', [StudentController::class, 'student_manage'])->middleware(['auth', 'verified'])->name('student.manage');
         
         Route::post('/student/store', [StudentController::class, 'student_store'])->middleware(['auth', 'verified'])->name('student.store');
         Route::post('/student/update/{student_id}', [StudentController::class, 'student_update'])->middleware(['auth', 'verified'])->name('student.update');
        Route::post('/student/delete/{id}', [StudentController::class, 'student_delete'])->middleware(['auth', 'verified'])->name('student.delete');
        

        
    });

    ///// Attendance Manage Route
    Route::group(['prefix' => '/attendance'], function(){
        Route::get('/manage', [AttendanceController::class, 'attendance_manage'])->middleware(['auth', 'verified'])->name('attendance.manage');
        Route::get('/take/{id}', [AttendanceController::class, 'attendance_take'])->middleware(['auth', 'verified'])->name('attendance.take');
        Route::post('/store', [AttendanceController::class, 'attendance_store'])->middleware(['auth', 'verified'])->name('attendance.store');
        Route::get('/manage/previous/{id}', [AttendanceController::class, 'previous_attendance_manage'])->middleware(['auth', 'verified'])->name('previous.attendance_manage');
        Route::get('/previous/edit/{date}', [AttendanceController::class, 'previous_attendance_edit'])->middleware(['auth', 'verified'])->name('edit.attendance');
        Route::post('/previous/update', [AttendanceController::class, 'previous_attendance_update'])->middleware(['auth', 'verified'])->name('update.attendance');


        /// search record
        Route::get('/search/{id}', [AttendanceController::class, 'search_attendance'])->middleware(['auth', 'verified'])->name('search.attendance');
        Route::post('/search/show', [AttendanceController::class, 'show_search_attendance'])->middleware(['auth', 'verified'])->name('search.show.attendance');

    });
    
});
