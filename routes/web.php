<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
//users
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\AccountController as UserAccount;
use App\Http\Controllers\Auth\AnnouncementController as UserAnnouncement;
use App\Http\Controllers\Auth\GuidelinesController as UserGuidelines;
use App\Http\Controllers\Auth\EvacuationController as UserEvacuation;
use App\Http\Controllers\Auth\VulnerabilityMapController as UserVulnerabilityMap;
use App\Http\Controllers\Auth\ReportsController as UserReports;

use App\Http\Controllers\Brgy\BrgyOfficialController;
use App\Http\Controllers\Brgy\AccountController as BrgyAccount;
use App\Http\Controllers\Brgy\AnnouncementController as BrgyAnnouncement;
use App\Http\Controllers\Brgy\DashboardController as BrgyDashboard;
use App\Http\Controllers\Brgy\GuidelinesController as BrgyGuidelines;
use App\Http\Controllers\Brgy\EvacuationController as BrgyEvacuation;
use App\Http\Controllers\Brgy\GenerateReportController as BrgyGenerateReport;
use App\Http\Controllers\Brgy\ManageResidentController as BrgyManageResident;
use App\Http\Controllers\Brgy\VulnerabilityMapController as BrgyVulnerabilityMap;
use App\Http\Controllers\Brgy\ReportsController as BrgyReports;
use App\Http\Controllers\Brgy\StatisticsController as BrgyStatsReport;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncement;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\EvacuationController as AdminEvacuation;
use App\Http\Controllers\Admin\GenerateReportController as AdminGenerateReport;
use App\Http\Controllers\Admin\GuidelinesController as AdminGuidelines;
use App\Http\Controllers\Admin\ManageResidentController as AdminManageResident;
use App\Http\Controllers\Admin\ManageBrgyOfficialController as AdminManageBrgy;
use App\Http\Controllers\Admin\VulnerabilityMapController as AdminVulnerabilityMap;
use App\Http\Controllers\Admin\ReportsController as AdminReports;
use App\Http\Controllers\Admin\StatisticsController as AdminStatsReport;


use App\Http\Controllers\LGU\DelaPazController as LGUBrgyDelaPaz;
use App\Http\Controllers\LGU\GenerateReportController as LGUGenerateReport;
use App\Http\Controllers\LGU\LocalUnit;
use App\Http\Controllers\LGU\ManggahanController as LGUBrgyManggahan;
use App\Http\Controllers\LGU\MaybungaController as LGUBrgyMaybunga;
use App\Http\Controllers\LGU\RosarioController as LGUBrgyRosario;
use App\Http\Controllers\LGU\SantolanController as LGUBrgySantolan;

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

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'auth.register')->name('register');
        Route::post('/create', [RegisterController::class, 'create'])->name('create');
        Route::post('/check', [LoginController::class, '/check'])->name('check');
        //Route::get('/email/verify', function () {
        //    return view('auth.verify');
        //})->name('verification.notice');
        //Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        //    $request->fulfill();
        //
        //    return redirect('/user/login');
        //})->name('verification.verify');
    });

    Route::middleware(['auth'])->group(function () {
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::resource('/account', UserAccount::class);
        Route::resource('/announcements', UserAnnouncement::class);
        Route::resource('/evacuation', UserEvacuation::class);
        Route::resource('/guidelines', UserGuidelines::class);
        Route::resource('/vulnerabilitymap', UserVulnerabilityMap::class);
        Route::resource('/reports', UserReports::class);
    });
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::view('/create', 'dashboard.admin.register_brgy')->name('register_brgy');
        Route::resource('/announcements', AdminAnnouncement::class);
        Route::resource('/evacuation', AdminEvacuation::class);
        Route::resource('/guidelines', AdminGuidelines::class);
        Route::resource('/vulnerabilitymap', AdminVulnerabilityMap::class);
        Route::resource('/reports', AdminReports::class);
        Route::post('/reports/confirm/{id}', [AdminReports::class, 'confirmReport']);
        Route::post('/reports/pending/{id}', [AdminReports::class, 'pendingReport']);
        Route::post('/manageresident/block/{manageresident}', [AdminManageResident::class, 'block'])->name('manageresident.block');
        Route::post('/manageresident/unblock/{manageresident}', [AdminManageResident::class, 'unblock'])->name('manageresident.unblock');
        Route::post('/manageresident/deactivate/{manageresident}', [AdminManageResident::class, 'deactivate'])->name('manageresident.deactivate');
        Route::post('/manageresident/activate/{manageresident}', [AdminManageResident::class, 'activate'])->name('manageresident.activate');
        Route::resource('/manageresident', AdminManageResident::class);
        Route::resource('/managebrgy_official', AdminManageBrgy::class);
        Route::resource('/stats', AdminStatsReport::class);
        Route::resource('/dashboard', AdminDashboard::class);
        Route::resource('/generate', AdminGenerateReport::class);
        Route::get('/dashboard/{brgy}', AdminDashboard::class, 'showBarangay');
    });
});

Route::prefix('brgy_official')->name('brgy_official.')->group(function () {
    Route::middleware(['guest:brgy_official'])->group(function () {
        Route::view('/login', 'dashboard.brgy_official.login')->name('login');
        Route::post('/check', [BrgyOfficialController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:brgy_official'])->group(function () {
        Route::view('/home', 'dashboard.brgy_official.home')->name('home');
        Route::resource('/account', BrgyAccount::class);
        Route::resource('/announcements', BrgyAnnouncement::class);
        Route::resource('/evacuation', BrgyEvacuation::class);
        Route::resource('/guidelines', BrgyGuidelines::class);
        Route::resource('/vulnerabilitymap', BrgyVulnerabilityMap::class);
        Route::resource('/reports', BrgyReports::class);
        Route::post('/reports/confirm/{id}', [BrgyReports::class, 'confirmReport']);
        Route::post('/reports/pending/{id}', [BrgyReports::class, 'pendingReport']);
        Route::post('/manageresident/block/{manageresident}', [BrgyManageResident::class, 'block'])->name('manageresident.block');
        Route::post('/manageresident/unblock/{manageresident}', [BrgyManageResident::class, 'unblock'])->name('manageresident.unblock');
        Route::post('/manageresident/deactivate/{manageresident}', [BrgyManageResident::class, 'deactivate'])->name('manageresident.deactivate');
        Route::post('/manageresident/activate/{manageresident}', [BrgyManageResident::class, 'activate'])->name('manageresident.activate');
        Route::resource('/manageresident', BrgyManageResident::class);
        Route::resource('/stats', BrgyStatsReport::class);
        Route::resource('/generate', BrgyGenerateReport::class);
        Route::resource('/dashboard', BrgyDashboard::class);
        
    });
});

Route::prefix('lgu')->name('lgu.')->group(function () {
    Route::middleware(['guest:local_unit'])->group(function () {
        Route::view('/login', 'dashboard.LGU.login')->name('login');
        Route::post('/check', [LocalUnit::class, 'check'])->name('check');
    });

    Route::middleware(['auth:local_unit'])->group(function () {
        Route::view('/home', 'dashboard.LGU.home')->name('home');
        Route::resource('/brgy_delapaz', LGUBrgyDelaPaz::class);
        Route::resource('/brgy_manggahan', LGUBrgyManggahan::class);
        Route::resource('/brgy_maybunga', LGUBrgyMaybunga::class);
        Route::resource('/brgy_rosario', LGUBrgyRosario::class);
        Route::resource('/brgy_santolan', LGUBrgySantolan::class);
        //Route::resource('/generate', LGUGenerateReport::class);
        Route::get('/generate/{brgy}', [LGUGenerateReport::class, 'showGenerator']);
        Route::post('/generate/{brgy}/{brgy_loc}', [LGUGenerateReport::class, 'testGenerate']);
    });
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
