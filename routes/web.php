<?php

use App\Http\Controllers\EmployeeController;
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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::resource('a_p_values', \App\Http\Controllers\APValueController::class);
    Route::resource('a_parameters', \App\Http\Controllers\AParameterController::class);
    Route::resource('accessories', \App\Http\Controllers\AccessoryController::class);
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
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
    Route::resource('positions', \App\Http\Controllers\PositionController::class);
    Route::resource('purposes', \App\Http\Controllers\PurposeController::class);
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::post('/assign-role', [\App\Http\Controllers\RoleController::class, 'assignRole'])->name('assignRole');
    Route::get('cart', [EmployeeController::class, 'cart'])->name('cart');
    Route::get('add-to-cart', [EmployeeController::class, 'addToCart'])->name('add.to.cart');
    Route::get('add-employee-to-cart', [EmployeeController::class, 'addEmployeeToCart'])->name('add.employee.to.cart');
    Route::delete('remove-from-cart', [EmployeeController::class, 'remove'])->name('remove.from.cart');
    Route::delete('remove-employee-from-cart', [EmployeeController::class, 'removeEmployee'])->name('remove.employee.from.cart');
    Route::delete('clear-box', [EmployeeController::class, 'clearBox'])->name('clear.box');
    Route::post('cart-store', [\App\Http\Controllers\EmployeeController::class, 'cartStore'])->name('cart.store');
    Route::get('send-to-storage', [EmployeeController::class, 'sendToStorage'])->name('send.to.storage');
    Route::resource('statuses', \App\Http\Controllers\StatusController::class);
    Route::resource('units', \App\Http\Controllers\UnitController::class);
    Route::post('device-parameter-store', [\App\Http\Controllers\DeviceController::class, 'deviceParameterStore'])->name('device.parameter.store');
});

Route::middleware(['auth:sanctum', 'role:admin|reviewer'])->group(function () {
    Route::get('a_p_values', [\App\Http\Controllers\APValueController::class, 'index'])->name('a_p_values.index');
    Route::get('a_parameters', [\App\Http\Controllers\AParameterController::class, 'index'])->name('a_parameters.index');
    Route::get('accessories', [\App\Http\Controllers\AccessoryController::class, 'index'])->name('accessories.index');
    Route::get('branches', [\App\Http\Controllers\BranchController::class, 'index'])->name('branches.index');
    Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('cities', [\App\Http\Controllers\CityController::class, 'index'])->name('cities.index');
    Route::get('conditions', [\App\Http\Controllers\ConditionController::class, 'index'])->name('conditions.index');
    Route::get('d_models', [\App\Http\Controllers\DModelController::class, 'index'])->name('d_models.index');
    Route::get('d_names', [\App\Http\Controllers\DNameController::class, 'index'])->name('d_names.index');
    Route::get('d_p_values', [\App\Http\Controllers\DPValueController::class, 'index'])->name('d_p_values.index');
    Route::get('d_parameters', [\App\Http\Controllers\DParameterController::class, 'index'])->name('d_parameters.index');
    Route::get('departments', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
    Route::get('devices', [\App\Http\Controllers\DeviceController::class, 'index'])->name('devices.index');
    Route::get('districts', [\App\Http\Controllers\DistrictController::class, 'index'])->name('districts.index');
    Route::get('employees', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
    Route::get('histories', [\App\Http\Controllers\HistoryController::class, 'index'])->name('histories.index');
    Route::get('locations', [\App\Http\Controllers\LocationController::class, 'index'])->name('locations.index');
    Route::get('manufacturers', [\App\Http\Controllers\ManufacturerController::class, 'index'])->name('manufacturers.index');
    Route::get('oblasts', [\App\Http\Controllers\OblastController::class, 'index'])->name('oblasts.index');
    Route::get('organizations', [\App\Http\Controllers\OrganizationController::class, 'index'])->name('organizations.index');
    Route::get('positions', [\App\Http\Controllers\PositionController::class, 'index'])->name('positions.index');
    Route::get('purposes', [\App\Http\Controllers\PurposeController::class, 'index'])->name('purposes.index');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
});











