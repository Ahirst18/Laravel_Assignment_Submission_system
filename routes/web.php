<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\studentController;
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

Route::get('/',[mainController::class,'welcome_page']);

///For Create Course 
Route::get('/create-course',[mainController::class,'create_course']);
Route::post('/store-course',[mainController::class,'store_course']);
Route::get('/edit-course/{id}',[mainController::class,'edit_course']);
Route::post('/update-course/{id}',[mainController::class,'update_course']);
Route::get('/delete-course/{id}',[mainController::class,'delete_course']);


Route::get('/enrollRequest',[mainController::class,'enroll_request']);
Route::get('/ViewenrolledStudent',[mainController::class,'enrolled_student']);
Route::get('/DeleteEnrolledStudent/{id}',[mainController::class,'delete_enrolled_student']);
Route::get('/approved/{id}',[mainController::class,'approved']);
Route::get('/canceled/{id}',[mainController::class,'canceled']);


Route::get('/dashboard',[mainController::class,'Dashboard']);
Route::get('/assignment',[mainController::class,'create_assignment']);
Route::get('/view_assign',[mainController::class,'viewSubmitted']);
Route::post('/store-assignment-data',[mainController::class,'store_assignment_data']);
Route::get('/viewAssignment',[mainController::class,'view_assignment']);
Route::get('/deleteAssignment/{id}',[mainController::class,'delete_assignment']);
Route::get('/download/{view_work}',[mainController::class,'download']);
Route::get('/view/{id}',[mainController::class,'view']);
Route::get('/courses',[mainController::class,'available_course']);
Route::get('/logOut',[mainController::class,'logout']);


///Admin Authentication
    Route::get('/adminLogin',[mainController::class,'admin_login']);
    Route::post('/adminLog',[mainController::class,'admin_log']);
    Route::get('/adminRegister',[mainController::class,'admin_register']);
    Route::post('/adminRegister',[mainController::class,'admin_reg']);


   
    //After Login the routes are accept by the loginUsers...
    Route::get('/sidebar',[studentController::class,'sidebarS']);
    Route::get('/profile',[studentController::class,'student_profile']);
    Route::get('/enrollCourse',[studentController::class,'enroll_course']);
    Route::post('/store-enroll-courses',[studentController::class,'store_enroll_courses']);
    Route::post('/fetch-data',[studentController::class,'fetch'])->name('enrollcourse.fetch');
    Route::get('/assignment-submission/{id}',[studentController::class,'assignment_submission']);
    Route::get('/viewEnrollCourse',[studentController::class,'view_enroll_course']);
    Route::get('/classWork',[studentController::class,'class_work']);
    Route::post('/store-work',[studentController::class,'store_work']);
    Route::get('/logOut',[studentController::class,'logout']);
    


///Student panel
    

//student login

    //the Admin is logged in to access the Routes...
     Route::get('/studentLogin',[studentController::class,'student_login']);
    Route::post('/studentLog',[studentController::class,'student_log']);
    Route::get('/studentRegister',[studentController::class,'student_register']);
    Route::post('/studentRegister',[studentController::class,'student_reg']);
   
   



