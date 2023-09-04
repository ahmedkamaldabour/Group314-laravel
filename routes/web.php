<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DoctorController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
    ]
    , function () {
    // login
    Route::group(
        [
            'middleware' => ['guest'],
            'controller' => LoginController::class
        ]
        , function () {
        Route::get('/login', 'loginPage')->name('loginPage');
        Route::post('/login', 'login')->name('login');
        Route::get('/logout', 'logout')->name('logout')
            ->middleware('auth')->withoutMiddleware('guest');

    });
    // admin
    Route::group(
        [
            'middleware' => ['auth', 'checkIsAdmin'],
        ]
        , function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    // doctor

    Route::group(
        [
            'prefix' => 'doctor',
            'as' => 'doctor.',
            'middleware' => ['auth', 'checkIsAdmin'],
        ]
        , function () {
        Route::get('/', [DoctorController::class, 'index'])->name('index');
        Route::get('/create', [DoctorController::class, 'create'])->name('create');
        Route::post('/store', [DoctorController::class, 'store'])->name('store');
        Route::get('/edit/{doctor}', [DoctorController::class, 'edit'])->name('edit');
        Route::put('/update/{doctor}', [DoctorController::class, 'update'])->name('update');
        Route::get('/delete/{doctor}', [DoctorController::class, 'destroy'])->name('destroy');
    });




});





