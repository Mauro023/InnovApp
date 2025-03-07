<?php

use Illuminate\Support\Facades\Route;


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
    return view('/auth/login');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
	Route::resource('users', App\Http\Controllers\Admin\UsersController::class, ['as' => 'admin']);

    Route::resource('roles', App\Http\Controllers\Admin\RolesController::class, ['except' => 'show', 'as' => 'admin']);
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionsController::class, ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

    Route::middleware('role:Admin')
    	->put('users/{user}/roles', 'App\Http\Controllers\Admin\UsersRolesController@update')
    	->name('admin.users.roles.update');

    Route::middleware('role:Admin')
        ->put('users/{user}/permissions', 'App\Http\Controllers\Admin\UsersPermissionsController@update')
        ->name('admin.users.permissions.update');

});

Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::get('/change-password', [App\Http\Controllers\PasswordChangeController::class, 'showChangeForm'])->name('password.change');
Route::post('/change-password', [App\Http\Controllers\PasswordChangeController::class, 'changePassword'])->name('password.change.post');

Route::group(['middleware' => ['auth', 'check.password.change']], function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('userEmployees', App\Http\Controllers\user_employeeController::class);
    Route::get('/createUsers', [App\Http\Controllers\user_employeeController::class, 'createUsers'])->name('get.createUsers');
    
    Route::resource('presenters', App\Http\Controllers\presenterController::class);
    Route::get('/pending', [App\Http\Controllers\presenterController::class, 'pending'])->name('pending.approved');
    
    Route::resource('standAssistances', App\Http\Controllers\stand_assistanceController::class);
    Route::get('/qrcode_scan', [App\Http\Controllers\stand_assistanceController::class, 'qrcode_scan'])->name('qrcode_scan.index');
    Route::get('/viewer', [App\Http\Controllers\stand_assistanceController::class, 'viewer'])->name('viewer.index');

    Route::resource('quarters', App\Http\Controllers\QuarterController::class);

    Route::resource('workPositions', App\Http\Controllers\Work_positionController::class);

    Route::resource('costCenters', App\Http\Controllers\Cost_centerController::class);

    Route::resource('services', App\Http\Controllers\ServiceController::class);

    Route::resource('employees', App\Http\Controllers\EmployeeController::class);
});


Route::resource('advisors', App\Http\Controllers\AdvisorController::class);


Route::resource('monthlyDatas', App\Http\Controllers\MonthlyDataController::class);
