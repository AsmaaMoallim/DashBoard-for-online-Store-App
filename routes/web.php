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
Route::get('/position', [\App\Http\Controllers\PositionController::class, 'index'])->name('position.index');
Route::get('/{table}/{id}/delete', [\App\Http\Controllers\PositionController::class, 'destroy'])->name('row.destroy');
Route::get('/{table}/{int}/update', [\App\Http\Controllers\PositionController::class, 'update'])->name('row.update');

Route::get('/manager', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');
Route::get('/{table}/{id}/delete', [\App\Http\Controllers\ManagerController::class, 'destroy'])->name('row.destroy');
Route::get('/{table}/{int}/update', [\App\Http\Controllers\ManagerController::class, 'update'])->name('row.update');








//////////////////////////////////////////////////Ruba

Route::get('/new-manager-form',[App\Http\Controllers\managerController::class,'showData']);
Route::post('/addManager', [App\Http\Controllers\managerController::class, 'addManager']);
//for testing edit
Route::post('/update', [App\Http\Controllers\managerController::class, 'update']);
Route::post('/TestEdit', [App\Http\Controllers\managerController::class, 'update']);
Route::view('/new-role-form','new-role-form');
Route::view('/new-photolibrary-form','new-photolibrary-form');
Route::view('/new-banner-form','new-banner-form');
Route::view('/new-mainDepartment-form','new-mainDepartment-form');
Route::view('/new-subDepartment-form','new-subDepartment-form');
Route::view('/new-client-form','new-client-form');
Route::view('/new-social-media-form','new-social-media-form');
Route::view('/new-bank-account-form','new-bank-account-form');
Route::view('/new-product-form','new-product-form');
Route::view('/measures-form','measures-form');
Route::view('/notifications-form','notifications-form');
Route::view('/TestEdit','TestEditting');
//Route::get('/test','test');
//Route::get('/test', function() {
// return view('test-form',['managers'=>manager::all()]); });
//
//Route::get('/test',[AppHttpControllers   estController::class,'index']);
//Route::get('/test', function () {
//    $manager = manager::all();
//    return view('new-manager-form', compact('manager'));
//});
//    Route::get('/test', function () {
//    $manager = DB::table('managers')->get();
//    return view('new-manager-form', compact('manager'));});
//Route::view('/test','test-form');
