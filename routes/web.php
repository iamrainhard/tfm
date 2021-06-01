<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\SalaryController;
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
    return view('landing');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/supervisor', [App\Http\Controllers\DetailController::class, 'supervisorView'])->name('supervisor');
Route::PATCH('/supervisor/edit/{supervisor}', [App\Http\Controllers\DetailController::class, 'supervisorEdit'])->name('supervisor.edit');
Route::POST('/supervisor/appoint', [App\Http\Controllers\DetailController::class, 'supervisorAppoint'])->name('supervisor.appoint');
Route::get('/pickers/delete/{picker}', [App\Http\Controllers\DetailController::class, 'destroy']);
Route::get('/production/delete/{id}', [App\Http\Controllers\ProductionController::class, 'destroy']);
Route::resources([
    'pickers' => DetailController::class,
    'production' => ProductionController::class,
    'salary' => SalaryController::class,
]);
