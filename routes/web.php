<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
//users
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\AccountController as UserAccount;
use App\Http\Controllers\Auth\AnnouncementController as UserAnnouncement;
use App\Http\Controllers\Auth\DashboardController as UserDashboard;
use App\Http\Controllers\Auth\GuidelinesController as UserGuidelines;
use App\Http\Controllers\Auth\EvacuationController as UserEvacuation;
use App\Http\Controllers\Auth\GenerateReportController as UserGenerateReport;
use App\Http\Controllers\Auth\LGUDashboardController as LGUDashboard;
use App\Http\Controllers\Auth\LGUEvacuationController as LGUEvacuation;
use App\Http\Controllers\Auth\LGUGenerateReportController as LGUGenerate;
use App\Http\Controllers\Auth\ManageResidentController as UserManageResident;
use App\Http\Controllers\Auth\PendingAnnouncements as UserPendingAnnouncements;
use App\Http\Controllers\Auth\VulnerabilityMapController as UserVulnerabilityMap;
use App\Http\Controllers\Auth\ReportsController as UserReports;
use App\Http\Controllers\Auth\StatisticsController as UserStatsReports;

use App\Http\Controllers\Brgy\BrgyOfficialController;
use App\Http\Controllers\Brgy\AccountController as BrgyAccount;
use App\Http\Controllers\Brgy\AnnouncementController as BrgyAnnouncement;
use App\Http\Controllers\Brgy\DashboardController as BrgyDashboard;
use App\Http\Controllers\Brgy\EmergencyController as BrgyEmergency;
use App\Http\Controllers\Brgy\GuidelinesController as BrgyGuidelines;
use App\Http\Controllers\Brgy\EvacuationController as BrgyEvacuation;
use App\Http\Controllers\Brgy\GenerateReportController as BrgyGenerateReport;
use App\Http\Controllers\Brgy\ManageResidentController as BrgyManageResident;
use App\Http\Controllers\Brgy\VulnerabilityMapController as BrgyVulnerabilityMap;
use App\Http\Controllers\Brgy\ReportsController as BrgyReports;
use App\Http\Controllers\Brgy\StatisticsController as BrgyStatsReport;

use App\Http\Controllers\Admin\ActivityLogController as AdminActivityLog;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncement;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\EmergencyController as AdminEmergency;
use App\Http\Controllers\Admin\EvacuationController as AdminEvacuation;
use App\Http\Controllers\Admin\GenerateReportController as AdminGenerateReport;
use App\Http\Controllers\Admin\GuidelinesController as AdminGuidelines;
use App\Http\Controllers\Admin\ManageBarangay as AdminManageBarangayLocations;
use App\Http\Controllers\Admin\ManageResidentController as AdminManageResident;
use App\Http\Controllers\Admin\ManageBrgyOfficialController as AdminManageBrgy;
use App\Http\Controllers\Admin\PendingAnnouncements as AdminPendingAnnouncements;
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
        Route::view('/login', 'auth.login')->name('login');
        //Route::view('/register', 'auth.register')->name('register');
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
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
        Route::resource('/pending', UserPendingAnnouncements::class);
        Route::post('/announcements/approve/{id}', [UserAnnouncement::class, 'approve'])->name('announcement.approve');
        Route::post('/announcements/disapprove/{id}', [UserAnnouncement::class, 'disapprove'])->name('announcement.disapprove');
        Route::resource('/evacuation', UserEvacuation::class);
        Route::resource('/evacuation-lgu', LGUEvacuation::class);
        Route::post('/evacuation/approve/{id}', [UserEvacuation::class,'approve'])->name('evacuation.approve');
        Route::resource('/guidelines', UserGuidelines::class);
        Route::resource('/vulnerabilitymap', UserVulnerabilityMap::class);
        Route::post('/vulnerabilitymap/approve/{id}', [UserVulnerabilityMap::class, 'approve'])->name('vulnerabilitymap.approve');
        Route::resource('/reports', UserReports::class);
        Route::get('/getreports/{id}', [UserReports::class, 'getreports']);
        Route::post('/reports/confirm/{id}', [UserReports::class, 'confirmReport']);
        Route::post('/reports/pending/{id}', [UserReports::class, 'pendingReport']);
        Route::resource('/manageresident', UserManageResident::class);
        Route::post('/manageresident/block/{manageresident}', [UserManageResident::class, 'block'])->name('manageresident.block');
        Route::post('/manageresident/unblock/{manageresident}', [UserManageResident::class, 'unblock'])->name('manageresident.unblock');
        Route::post('/manageresident/deactivate/{manageresident}', [UserManageResident::class, 'deactivate'])->name('manageresident.deactivate');
        Route::post('/manageresident/activate/{manageresident}', [UserManageResident::class, 'activate'])->name('manageresident.activate');
        Route::post('/manageresident/approve/{manageresident}', [UserManageResident::class, 'approve'])->name('manageresident.approve');
        Route::post('/manageresident/disapprove/{manageresident}', [UserManageResident::class, 'disapprove'])->name('manageresident.disapprove');
        Route::post('/manageresident/promotesubordinate/{manageresident}', [UserManageResident::class, 'subordinates'])->name('manageresident.subordinates');
        Route::post('/manageresident/promoteresident/{manageresident}', [UserManageResident::class, 'residents'])->name('manageresident.residents');
        Route::resource('/manageresident', UserManageResident::class);
        Route::resource('/stats', UserStatsReports::class);
        Route::resource('/generate', UserGenerateReport::class);
        Route::resource('/dashboard', UserDashboard::class);
        Route::resource('/dashboard-lgu', LGUDashboard::class);
        Route::get('/dashboard-lgu/brgy/{brgy}', [LGUDashboard::class, "brgyDashboard"])->name('dashboard.stats');
        Route::get('/generate-lgu/{brgy}', [LGUGenerate::class, 'showGenerator']);
        Route::post('/generate-lgu/{brgy}/{brgy_loc}', [LGUGenerate::class, 'testGenerate']);
        Route::resource('/emergencymessage', BrgyEmergency::class);
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
        Route::resource('/pending', AdminPendingAnnouncements::class);
        //Route::view('/announcements/pending', 'features.pendingannouncements')->name('announcement.pending');
        //Route::resource('/announcements/pending', AdminPendingAnnouncements::class);
        //Route::get('/announcements/pending', [AdminAnnouncement::class, 'pending'])->name('announcement.pending');
        Route::post('/announcements/approve/{id}', [AdminAnnouncement::class, 'approve'])->name('announcement.approve');
        Route::post('/announcements/disapprove/{id}', [AdminAnnouncement::class, 'disapprove'])->name('announcement.disapprove');
        Route::resource('/evacuation', AdminEvacuation::class);
        Route::post('/evacuation/approve/{id}', [AdminEvacuation::class,'approve'])->name('evacuation.approve');
        //Route::post('/evacuation/delete/', [AdminEvacuation::class, 'deleteEvacuation'])->name('evacuation.delete');
        //Route::post('/evacuation/delete/{id}', [AdminEvacuation::class,'deleteEvacuation'])->name('evacuation.delete');
        Route::resource('/guidelines', AdminGuidelines::class);
        Route::resource('/vulnerabilitymap', AdminVulnerabilityMap::class);
        Route::post('/vulnerabilitymap/approve/{id}', [AdminVulnerabilityMap::class, 'approve'])->name('vulnerabilitymap.approve');
        Route::resource('/reports', AdminReports::class);
        Route::post('/reports/confirm/{id}', [AdminReports::class, 'confirmReport']);
        Route::post('/reports/pending/{id}', [AdminReports::class, 'pendingReport']);
        Route::post('/manageresident/block/{manageresident}', [AdminManageResident::class, 'block'])->name('manageresident.block');
        Route::post('/manageresident/unblock/{manageresident}', [AdminManageResident::class, 'unblock'])->name('manageresident.unblock');
        Route::post('/manageresident/deactivate/{manageresident}', [AdminManageResident::class, 'deactivate'])->name('manageresident.deactivate');
        Route::post('/manageresident/activate/{manageresident}', [AdminManageResident::class, 'activate'])->name('manageresident.activate');
        Route::post('/manageresident/approve/{manageresident}', [AdminManageResident::class, 'approve'])->name('manageresident.approve');
        Route::post('/manageresident/disapprove/{manageresident}', [AdminManageResident::class, 'disapprove'])->name('manageresident.disapprove');
        Route::post('/manageresident/promotelgu/{manageresident}', [AdminManageResident::class, 'lgu'])->name('manageresident.lgu');
        Route::post('/manageresident/promotechairman/{manageresident}', [AdminManageResident::class, 'chairman'])->name('manageresident.chairman');
        Route::post('/manageresident/promotecochairman/{manageresident}', [AdminManageResident::class, 'coChairman'])->name('manageresident.cochairman');
        Route::post('/manageresident/promotesecretary/{manageresident}', [AdminManageResident::class, 'secretary'])->name('manageresident.secretary');
        Route::post('/manageresident/promotesubordinate/{manageresident}', [AdminManageResident::class, 'subordinates'])->name('manageresident.subordinates');
        Route::post('/manageresident/promoteresident/{manageresident}', [AdminManageResident::class, 'residents'])->name('manageresident.residents');
        Route::post('/manageresident/promote/{manageresident}', [AdminManageResident::class, 'incrementRole'])->name('manageresident.promote');
        Route::resource('/manageresident', AdminManageResident::class);
        Route::resource('/managebrgy_official', AdminManageBrgy::class);
        Route::post('/managebrgy_official/demote/{managebarangay}', [AdminManageBrgy::class, 'decrementRole'])->name('manageresident.demote');
        Route::resource('/stats', AdminStatsReport::class);
        Route::resource('/dashboard', AdminDashboard::class);
        Route::get('/dashboard/brgy/{brgy}', [AdminDashboard::class, "brgyDashboard"])->name('dashboard.stats');
        //Route::resource('/generate', AdminGenerateReport::class);
        Route::get('/generate/{brgy}', [AdminGenerateReport::class, 'showGenerator']);
        Route::post('/generate/{brgy}/{brgy_loc}', [AdminGenerateReport::class, 'testGenerate']);
        Route::resource('/emergencymessage', AdminEmergency::class);
        Route::resource('/managebarangay', AdminManageBarangayLocations::class);
        Route::post('/managebarangay/addbarangay/{id}', [AdminManageBarangayLocations::class, 'addBarangay']);
        Route::post('/managebarangay/addbarangaymap/{id}', [AdminManageBarangayLocations::class, 'addBarangayMap'])->name('managebarangay.add');
        Route::post('/managebarangay/deletebarangay/{id}', [AdminManageBarangayLocations::class, 'deleteBarangay']);
        Route::post('/managebarangay/delete/{id}', [AdminManageBarangayLocations::class, 'delete']);
        Route::resource('/activitylog', AdminActivityLog::class);
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
        Route::resource('/emergencymessage', BrgyEmergency::class);
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


Route::get('/sample', function () {
    return view('layouts.master');
});
