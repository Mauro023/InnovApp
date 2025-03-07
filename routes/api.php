<?php

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

Route::resource('user_employees', App\Http\Controllers\API\user_employeeAPIController::class);


Route::resource('presenters', App\Http\Controllers\API\presenterAPIController::class);
Route::get('/showPending/{userid}', [App\Http\Controllers\API\presenterAPIController::class, 'showPending']);
Route::get('/showApproved/{userid}', [App\Http\Controllers\API\presenterAPIController::class, 'showApproved']);
Route::get('/showPresenter/{userid}', [App\Http\Controllers\API\presenterAPIController::class, 'showPresenter']);
Route::post('/approveAttendance', [App\Http\Controllers\API\presenterAPIController::class, 'approveAttendance']);

Route::resource('stand_assistances', App\Http\Controllers\API\stand_assistanceAPIController::class);
Route::get('/viewer/{userid}', [App\Http\Controllers\API\stand_assistanceAPIController::class, 'viewer']);


Route::resource('quarters', App\Http\Controllers\API\QuarterAPIController::class);


Route::resource('work_positions', App\Http\Controllers\API\Work_positionAPIController::class);


Route::resource('cost_centers', App\Http\Controllers\API\Cost_centerAPIController::class);


Route::resource('services', App\Http\Controllers\API\ServiceAPIController::class);


Route::resource('employees', App\Http\Controllers\API\EmployeeAPIController::class);


Route::resource('advisors', App\Http\Controllers\API\AdvisorAPIController::class);


Route::resource('monthly_datas', App\Http\Controllers\API\MonthlyDataAPIController::class);
