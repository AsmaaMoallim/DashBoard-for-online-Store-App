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
Route::get('/position', [\App\Http\Controllers\PositionController::class, 'index']);
Route::get('/manager', [\App\Http\Controllers\ManagerController::class, 'index'])->name('main.index');
Route::get('/maneger/{id}/delete', [\App\Http\Controllers\ManagerController::class, 'destroy'])->name('row.destroy');
//Route::post('/maneger/{row}/delete', [\App\Http\Controllers\ManagerController::class, 'destroy'],['row' => '$rows->man_id'])->name('row.destroy');
Route::get('/perm', [\App\Http\Controllers\PermissionController::class, 'index'])->name('perm.index');
Route::get('/maneger/{int}/update', [\App\Http\Controllers\ManagerController::class, 'update'])->name('row.update');
