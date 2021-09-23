<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Brgy\BrgyOfficialController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LGU\LocalUnit;
use App\Http\Controllers\Features\AccountController;
use App\Http\Controllers\Features\EvacuationController;
use App\Http\Controllers\Features\GuidelinesController;
use App\Models\Guidelines;
use League\Flysystem\Adapter\Local;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest'])->group(function(){
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [RegisterController::class, 'create'])->name('create');
        Route::post('/check', [LoginController::class, 'check'])->name('check');
    });

    Route::middleware(['auth'])->group(function(){
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::resource('/account', AccountController::class);
        Route::resource('/evacuation', EvacuationController::class);
        Route::resource('/guidelines', GuidelinesController::class);
    });
});


Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::view('/create', 'dashboard.admin.register_brgy')->name('register_brgy');
        Route::view('/account', 'dashboard.user.account')->name('account');
        Route::view('/evacuation', 'dashboard.user.evacuationcenter')->name('evacuation');
        Route::view('/guidelines', 'dashboard.user.guidelines')->name('guidelines');
    });
});

Route::prefix('brgy_official')->name('brgy_official.')->group(function(){
    Route::middleware(['guest:brgy_official'])->group(function () {
        Route::view('/login', 'dashboard.brgy_official.login')->name('login');     
        Route::post('/check', [BrgyOfficialController::class, 'check'])->name('check');     
    });

    Route::middleware(['auth:brgy_official'])->group(function () {
        Route::view('/home', 'dashboard.brgy_official.home')->name('home');
        Route::view('/account', 'dashboard.user.account')->name('account');
        Route::view('/evacuation', 'dashboard.user.evacuationcenter')->name('evacuation');
        Route::view('/guidelines', 'dashboard.user.guidelines')->name('guidelines');
    });
});

Route::prefix('lgu')->name('lgu.')->group(function(){
    Route::middleware(['guest:local_unit'])->group(function () {
        Route::view('/login', 'dashboard.LGU.login')->name('login');
        Route::post('/check', [LocalUnit::class, 'check'])->name('check');
    });

    Route::middleware(['auth:local_unit'])->group(function () {
        Route::view('/home', 'dashboard.LGU.home')->name('home');
    });
});