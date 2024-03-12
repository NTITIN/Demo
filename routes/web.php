<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\AttendanceController;

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
    return view('login');
});

// Route::post('/save_link',[UserController::class, 'save_link']);

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/login', 'index')->name('login');
});


Route::controller(UserController::class)->group(function(){

    Route::get('editleads/{lead}', [UserController::class, 'editlead'])->name('lead.edit');

    Route::get('/leads/{lead}', [UserController::class, 'deleteleads'])->name('lead.delete');

    Route::post('updateleads/{lead}', [UserController::class, 'updateleads'])->name('lead.update');

    Route::get('login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('add_leads', 'add_leads')->name('add_leads');

    Route::post('/leaddetails', 'leaddetails')->name('leaddetails');

    Route::post('import', 'import')->name('import');

    Route::get('samplecsv', 'samplecsv')->name('samplecsv');
    
    Route::post('save_ip_count', 'save_ip_count')->name('save_ip_count');

    Route::any('import', [UserController::class, 'importBulkPOCCSV'])->name('import');

    Route::get('leadexport', 'leadexport')->name('leadexport');

    Route::get('/view_leads', 'view_leads')->name('view_leads');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('validate_login');

    Route::get('dashboard', 'dashboard')->name('dashboard');

    Route::get('/punch-in', [AttendanceController::class, 'punchIn'])->name('punch-in');

    Route::get('/punch-out', [AttendanceController::class, 'punchOut'])->name('punch-out');

});
