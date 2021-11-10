<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\RegisterController;
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


// Route::view('/', 'welcome');


Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/doctor', [LoginController::class, 'showDoctorLoginForm']);
Route::get('/login/patient', [LoginController::class, 'showPatientLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/doctor', [RegisterController::class,'showDoctorRegisterForm']);
Route::get('/register/patient', [RegisterController::class,'showPatientRegisterForm']);

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/patient', [RegisterController::class,'createPatient']);

Route::post('/patient', [RegisterController::class,'createPatient']);

Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::view('/admin', 'admin.adminhomepage');
    Route::view('/add-clinic', 'admin.adminhomepage')->name('add_clinic');
});

// Route::group(['middleware' => 'auth:patient'], function () {
    
//     Route::view('/patient', 'patient.patienthomepage');
// });

Route::get('logout', [LoginController::class,'logout'])->name('logout');
Route::get('/homepage',[HomeController::class,'Homepage'])->name('homepage');
Route::get('/',[IndexController::class,'index'])->name('index');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
