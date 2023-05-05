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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('devices', \App\Http\Controllers\DeviceController::class);
Route::resource('manufacturers', \App\Http\Controllers\ManufacturerController::class);
Route::resource('device_names', \App\Http\Controllers\DeviceNameController::class);
Route::resource('device_models', \App\Http\Controllers\DeviceModelController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
Route::resource('accessory_accessory_parameters', \App\Http\Controllers\AccessoryAccessoryParameterController::class);
Route::resource('accessory_devices', \App\Http\Controllers\AccessoryDeviceController::class);
Route::resource('accessories', \App\Http\Controllers\AccessoryController::class);
Route::resource('accessory_parameters', \App\Http\Controllers\AccessoryParameterController::class);
Route::resource('accessory_parameter_values', \App\Http\Controllers\AccessoryParameterValueController::class);
Route::resource('parameters', \App\Http\Controllers\ParameterController::class);
Route::resource('parameter_device_names', \App\Http\Controllers\ParameterDeviceNameController::class);
Route::resource('branches', \App\Http\Controllers\BranchController::class);
Route::resource('branch_departments', \App\Http\Controllers\BranchDepartmentController::class);
Route::resource('cities', \App\Http\Controllers\CityController::class);
Route::resource('conditions', \App\Http\Controllers\ConditionController::class);
Route::resource('departments', \App\Http\Controllers\DepartmentController::class);
Route::resource('districts', \App\Http\Controllers\DistrictController::class);
Route::resource('histories', \App\Http\Controllers\HistoryController::class);
Route::resource('locations', \App\Http\Controllers\LocationController::class);
Route::resource('oblasts', \App\Http\Controllers\OblastController::class);
Route::resource('organizations', \App\Http\Controllers\OrganizationController::class);
Route::resource('parameter_values', \App\Http\Controllers\ParameterValueController::class);
Route::resource('positions', \App\Http\Controllers\PositionController::class);
Route::resource('purposes', \App\Http\Controllers\PurposeController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);

