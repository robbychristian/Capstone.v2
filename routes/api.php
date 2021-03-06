<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\AnnouncementController;
use App\Http\Controllers\Auth\EvacuationController;
use App\Http\Controllers\Auth\ReportsController;
use App\Http\Controllers\Auth\VulnerabilityMapController;
use App\Http\Controllers\Admin\ManageBarangay;
use App\Http\Controllers\Auth\GuidelinesController;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('logincreds', [AccountController::class, 'creds']);
Route::get("search/{email}", [AccountController::class, 'search']);
Route::post("fetch", [AccountController::class, 'fetchCreds']);
Route::get("announcements/{brgy}", [AnnouncementController::class, 'fetchAnnouncements']);
Route::get("fetchreport/{id}/{brgy}", [ReportsController::class, 'fetchReport']);
//Route::post('upload/', [ReportsController::class, 'uploadReport']);
Route::post("sendreport", [ReportsController::class, 'submitReport']);
Route::post("uploadimage", [ReportsController::class, 'uploadImage']);
Route::get('deletereport/{id}', [ReportsController::class, 'deleteReport']);
Route::get('vulnerablearea/{brgy}', [VulnerabilityMapController::class, 'fetchLocations']);
Route::get('evacuationcenters/{brgy}', [EvacuationController::class, 'fetchEvacuation']);
Route::post('updateprofile', [AccountController::class, 'editProfile']);
Route::post('checkpass', [AccountController::class, 'checkPass']);
//for register mobile
Route::get('allBrgys', [ManageBarangay::class, 'mobileBarangays']);
//for guidelines
Route::get('earthquake', [GuidelinesController::class, 'guidelinesEarthquake']);
Route::get('flood', [GuidelinesController::class, 'guidelinesFlood']);
Route::get('cyclone', [GuidelinesController::class, 'guidelinesCyclone']);
Route::get('tsunami', [GuidelinesController::class, 'guidelinesTsunami']);

Auth::routes();
