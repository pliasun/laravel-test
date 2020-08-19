<?php

use App\Http\Controllers\Admin\AdminController;
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

Auth::routes(['register' => false]);

Route::prefix('/')->name('admin.')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    Route::get('employee', 'EmployeeController@list')->name('employee.list');
    
    Route::resource('company', 'CompanyController');
    Route::resource('company/{company}/employee', 'EmployeeController');
});
