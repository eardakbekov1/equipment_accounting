<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('a_p_values', \App\Http\Controllers\APValueController::class);
Route::resource('a_parameters', \App\Http\Controllers\AParameterController::class);
Route::resource('accessories', \App\Http\Controllers\AccessoryController::class);
Auth::routes();
Route::resource('branches', \App\Http\Controllers\BranchController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('cities', \App\Http\Controllers\CityController::class);
Route::resource('conditions', \App\Http\Controllers\ConditionController::class);
Route::resource('d_models', \App\Http\Controllers\DModelController::class);
Route::resource('d_names', \App\Http\Controllers\DNameController::class);
Route::resource('d_p_values', \App\Http\Controllers\DPValueController::class);
Route::resource('d_parameters', \App\Http\Controllers\DParameterController::class);
Route::resource('departments', \App\Http\Controllers\DepartmentController::class);
Route::resource('devices', \App\Http\Controllers\DeviceController::class);
Route::resource('districts', \App\Http\Controllers\DistrictController::class);
Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
Route::resource('histories', \App\Http\Controllers\HistoryController::class);
Route::resource('locations', \App\Http\Controllers\LocationController::class);
Route::resource('manufacturers', \App\Http\Controllers\ManufacturerController::class);
Route::resource('oblasts', \App\Http\Controllers\OblastController::class);
Route::resource('organizations', \App\Http\Controllers\OrganizationController::class);
Route::resource('positions', \App\Http\Controllers\PositionController::class);
Route::resource('purposes', \App\Http\Controllers\PurposeController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);











