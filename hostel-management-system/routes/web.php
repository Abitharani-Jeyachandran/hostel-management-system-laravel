<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

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

// landing page
// Route::get('/', function () {
//     return view('layouts.app');
// })->name('landing-page');

// auth routes
Route::get('/' , [AuthController::class, 'loginPage'])->name('landing-page');
Route::get('login' , [AuthController::class, 'loginPage'])->name('login');
Route::post('login' , [AuthController::class, 'login'])->name('login-submit');

// warden routes
Route::group(['prefix' => 'warden', 'as' => 'warden.'], function () {
    // auth routes
    Route::post('logout' , [AuthController::class, 'logout'])->name('logout');

    // protected routes
    Route::group(['middleware' => ['auth','warden']], function () {
        // home route
        Route::get('home', [HomeController::class, 'index'])->name('home');

        // profile routes
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/{user}/edit', [ProfileController::class, 'update'])->name('profile.update');

        // student related routes
        Route::resource('students', StudentController::class);
    });
});

// sub-warden routes
Route::group(['prefix' => 'sub-warden', 'as' => 'sub-warden.'], function () {
    // auth routes
    Route::post('logout' , [AuthController::class, 'logout'])->name('logout');

    // protected routes
    Route::group(['middleware' => ['auth','sub_warden']], function () {
        // home route
        Route::get('home', [HomeController::class, 'index'])->name('home');

        // profile routes
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/{user}/edit', [ProfileController::class, 'update'])->name('profile.update');
    });
});

// student routes
Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    // auth routes
    Route::post('logout' , [AuthController::class, 'logout'])->name('logout');

    // protected routes
    Route::group(['middleware' => ['auth','student']], function () {
        // home route
        Route::get('home', [HomeController::class, 'index'])->name('home');

        // profile routes
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/{user}/edit', [ProfileController::class, 'update'])->name('profile.update');
    });
});

//Appeal for crud
//Hirunika Wijesinghe (UWU/CST/18/032 function)
Route::get('/appeal', function() {
    return view('student_appeal');
});

Route::get('/insert_appeal', function() {
    return view('insert_appeal');
});

//AView Assigned hostel
//Jayani Hansani (UWU/CST/18/042 function)


Route::get('/view_hostel', function() {
    return view('view_hostel');
});


Route::get('/list',[HostelList::class,'warden']);
Route::get('/list_sub',[HostelList::class,'subwarden']);