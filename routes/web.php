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
Route::resource('accessories_accessory_parameters', \App\Http\Controllers\AccessoriesAccessoryParameterController::class);
Route::resource('accessories_devices', \App\Http\Controllers\AccessoriesDeviceController::class);
Route::resource('accessories', \App\Http\Controllers\AccessoryController::class);
Route::resource('accessory_parameters', \App\Http\Controllers\AccessoryParameterController::class);
Route::resource('accessory_parameters_values', \App\Http\Controllers\AccessoryParametersValueController::class);
Route::resource('parameters', \App\Http\Controllers\ParameterController::class);
Route::resource('parameters_device_names', \App\Http\Controllers\ParametersDeviceNameController::class);

