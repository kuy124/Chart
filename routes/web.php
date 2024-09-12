<?php

use App\Models\Performance;
use App\Http\Middleware\CheckIsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JabatanDataController;


Route::middleware([CheckIsAdmin::class])->group(function () {
    Route::get('/admin1', function () {
        return view('chart');
    });
    
    Route::get('/admin2', function () {
        return view('chart2');
    });    

    Route::get('/jabatan-data', [JabatanDataController::class, 'index']);
    Route::post('/add-jabatan-data', [JabatanDataController::class, 'addData']);
    Route::post('/update-jabatan-data', [JabatanDataController::class, 'updateData']);
    Route::post('/delete-jabatan-data', [JabatanDataController::class, 'deleteData']);
    
    Route::get('/chart-data', [ChartController::class, 'getData']);
    Route::post('/add-chart-data', [ChartController::class, 'addData']);
    Route::post('/update-chart-data', [ChartController::class, 'updateData']);
    Route::post('/delete-chart-data', [ChartController::class, 'deleteData']);
});

Route::get('/kontak', function () {
    return view('kontak');
});  
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/jabatan-data', [JabatanDataController::class, 'index']);
Route::post('/add-jabatan-data', [JabatanDataController::class, 'addData']);
Route::post('/update-jabatan-data', [JabatanDataController::class, 'updateData']);
Route::post('/delete-jabatan-data', [JabatanDataController::class, 'deleteData']);

Route::get('/chart-data', [ChartController::class, 'getData']);
Route::post('/add-chart-data', [ChartController::class, 'addData']);
Route::post('/update-chart-data', [ChartController::class, 'updateData']);
Route::post('/delete-chart-data', [ChartController::class, 'deleteData']);

Route::get('/2', function () {
    return view('chartview2');
});

Route::get('/', function () {
    return view('chartview');
});
