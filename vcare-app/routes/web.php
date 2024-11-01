<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\BookedController;
use App\Http\Controllers\admin\MajorsController;
use App\Http\Controllers\admin\MessagesController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\DoctorsAdminController;


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
    Route::get('/logout',[DashboardController::class,'logout'])->name('user.logout');
    Route::get('/Dashboard',[DashboardController::class,'indexUser'])->name('user.dashboard');
    Route::get('/Booked',[DashboardController::class,'indexBooked'])->name('user.Booked');

});

//////////////////////// DOCTOR SECTION //////////////////////
Route::group(['middleware'=>'auth','prefix'=>'doctors'],function(){
    Route::get('/logout',[DashboardController::class,'logout'])->name('doctor.logout');
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
    ///////////// DOCTORS SECTION ///////////////////
    Route::get('/AllDoctors',[DoctorsAdminController::class,'AllDoctors'])->name('admin.AllDoctors');
    Route::get('/getBooked/{id}',[DoctorsAdminController::class,'getBooked'])->name('admin.getBooked');
    Route::get('/NewDoctor',[DoctorsAdminController::class,'NewDoctor'])->name('admin.NewDoctor');
    Route::post('/StoreNewDoctor',[DoctorsAdminController::class,'StoreNewDoctor'])->name('admin.StoreNewDoctor');
    Route::get('/EditDoctor/{id}',[DoctorsAdminController::class,'EditDoctor'])->name('admin.EditDoctor');
    Route::post('/StoreEditDoctor',[DoctorsAdminController::class,'StoreEditDoctor'])->name('admin.StoreEditDoctor');
    Route::post('/DeleteDoctor/{id}',[DoctorsAdminController::class,'DeleteDoctor'])->name('admin.DeleteDoctor');
    ///////////// MESSAGES SECTION ///////////////////
    Route::get('/AllMessages',[MessagesController::class,'AllMessages'])->name('admin.AllMessages');
    Route::get('/ReadMessages/{id}',[MessagesController::class,'ReadMessages'])->name('admin.ReadMessages');
    Route::post('/DeleteMessages/{id}',[MessagesController::class,'DeleteMessages'])->name('admin.DeleteMessages');
    ///////////// MAJOR SECTION ///////////////////
    Route::get('/AllMajors',[MajorsController::class,'AllMajors'])->name('admin.AllMajors');
    Route::get('/NewMajors',[MajorsController::class,'NewMajors'])->name('admin.NewMajors');
    Route::post('/StoreNewMajors',[MajorsController::class,'StoreNewMajors'])->name('admin.StoreNewMajors');
    Route::get('/EditMajors/{id}',[MajorsController::class,'EditMajors'])->name('admin.EditMajors');
    Route::post('/StoreEditMajors',[MajorsController::class,'StoreEditMajors'])->name('admin.StoreEditMajors');
    Route::post('/DeleteMajor/{id}',[MajorsController::class,'DeleteMajor'])->name('admin.DeleteMajor');
    ///////////// USERS SECTION ///////////////////
    Route::get('/AllUsers',[UsersController::class,'AllUsers'])->name('admin.AllUsers');
    Route::get('/AddUsers',[UsersController::class,'AddUsers'])->name('admin.AddUsers');
    Route::post('/StoreAddUsers',[UsersController::class,'StoreAddUsers'])->name('admin.StoreAddUsers');
    Route::get('/EditUsers/{id}',[UsersController::class,'EditUsers'])->name('admin.EditUsers');
    Route::post('/StoreEditUsers',[UsersController::class,'StoreEditUsers'])->name('admin.StoreEditUsers');
    Route::post('/DeleteUsers/{id}',[UsersController::class,'DeleteUsers'])->name('admin.DeleteUsers');
    ///////////// SETTINGS SECTION ///////////////////
    Route::get('/Settings',[SettingsController::class,'Settings'])->name('admin.Settings');
    Route::post('/StoreSettings',[SettingsController::class,'StoreSettings'])->name('admin.StoreSettings');
    ///////////// NEWS SECTION ///////////////////
    Route::get('/AllNews',[NewsController::class,'AllNews'])->name('admin.AllNews');
    Route::get('/AddNews',[NewsController::class,'AddNews'])->name('admin.AddNews');
    Route::post('/StoreAddNews',[NewsController::class,'StoreAddNews'])->name('admin.StoreAddNews');
    Route::get('/EditNews/{id}',[NewsController::class,'EditNews'])->name('admin.EditNews');
    Route::post('/StoreEditNews',[NewsController::class,'StoreEditNews'])->name('admin.StoreEditNews');
    Route::post('/DeleteNews/{id}',[NewsController::class,'DeleteNews'])->name('admin.DeleteNews');

    ///////////// BOOKED SECTION ///////////////////
    Route::get('/AllBooked',[BookedController::class,'AllBooked'])->name('admin.AllBooked');

});



Route::get("/404",function(){
    return view('errors.404');
})->name('404');
Route::get('/logout',[DashboardController::class,'logout'])->name('logout');
