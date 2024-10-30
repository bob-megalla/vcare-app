<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RegisterController;


/// Home Section
Route::get('/',[WelcomeController::class,'index'])->name('home');
/// Major Section
Route::get('/indexMajor',[MajorController::class,'index'])->name('indexMajor');
Route::get('/getDoctors/{id}',[MajorController::class,'getDoctors'])->name('getDoctors');
/// Doctors Section
Route::get('/indexDoctors',[DoctorsController::class,'index'])->name('indexDoctors');
Route::get('/storeAppointment/{id}',[DoctorsController::class,'storeAppointment'])->name('storeAppointment')->middleware('auth');
Route::post('/storeAppointmentPOST',[DoctorsController::class,'storeAppointmentPOST'])->name('storeAppointmentPOST')->middleware('auth');

/// Login Section
Route::get('/indexLogin',[LoginController::class,'index'])->name('indexLogin')->middleware('guest');
Route::post('/postLogin',[AuthController::class,'checkUser'])->name('checkUser')->middleware('guest');
/// Register Section
Route::get('/indexRegister',[RegisterController::class,'index'])->name('indexRegister');
Route::post('/postRegister',[AuthController::class,'registerUser'])->name('registerUser');

/// Contact Section
Route::get('/indexContact',[ContactController::class,'index'])->name('indexContact');
Route::post('/sendMessage',[ContactController::class,'sendMessage'])->name('sendMessage');

//////////////////////// USER SECTION //////////////////////
Route::group(['middleware'=>'auth','prefix'=>'user'],function(){
    Route::get('/logout',[DashboardController::class,'logout'])->name('logout');
    Route::get('/Dashboard',[DashboardController::class,'indexUser'])->name('user.dashboard');
    Route::get('/Booked',[DashboardController::class,'indexBooked'])->name('user.Booked');

});

//////////////////////// DOCTOR SECTION //////////////////////
Route::group(['middleware'=>'auth','prefix'=>'doctors'],function(){
    Route::get('/logout',[DashboardController::class,'logout'])->name('logout');
    Route::get('/BookedDoctor',[DashboardController::class,'indexBookedDoctor'])->name('doctor.BookedDoctor');
    Route::get('/Dashboard',[DashboardController::class,'indexDoctor'])->name('doctor.dashboard');
    Route::get('/changeStatusBooked/{id}',[DoctorsController::class,'changeStatusBooked'])->name('doctor.changeStatusBooked');
    Route::get('/changeStatusBookedRead/{id}',[DoctorsController::class,'changeStatusBookedRead'])->name('doctor.changeStatusBookedRead');
    Route::get('/deleteBooked/{id}',[DoctorsController::class,'deleteBooked'])->name('doctor.deleteBooked');

});

//////////////////////// ADMIN SECTION //////////////////////
Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
    Route::get('/logout',[DashboardController::class,'logout'])->name('logout');
    Route::get('/Dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

});



