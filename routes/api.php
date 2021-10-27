<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\AnnouncementController;
use App\Http\Controllers\Auth\ReportsController;
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

Route::get('list', [AccountController::class, 'listAPI']);
Route::get('logincreds/{email}/{pass}', [AccountController::class, 'creds']);
Route::get("search/{email}", [AccountController::class, 'search']);
Route::get("fetch/{email}", [AccountController::class, 'fetchCreds']);
Route::get("announcements", [AnnouncementController::class, 'fetchAnnouncements']);
Route::get("fetchreport/{id}", [ReportsController::class, 'fetchReport']);
Route::get('sendReport/{id}/{fname}/{mname}/{lname}/{title}/{desc}/{lat}/{len}/{img}', [ReportsController::class, 'sendReport']);
Route::post('upload/', [ReportsController::class, 'uploadReport']);

Auth::routes();
