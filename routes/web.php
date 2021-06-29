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


Route::get('/manager', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');
Route::get('/manager/{id}/delete', [\App\Http\Controllers\ManagerController::class, 'destroy'])->name('manager.destroy');
Route::get('/manager/{int}/update', [\App\Http\Controllers\ManagerController::class, 'update'])->name('manager.update');

Route::get('/position', [\App\Http\Controllers\PositionController::class, 'index'])->name('position.index');
Route::get('/position/{id}/delete', [\App\Http\Controllers\PositionController::class, 'destroy'])->name('position.destroy');
Route::get('/position/{int}/update', [\App\Http\Controllers\PositionController::class, 'update'])->name('position.update');


Route::get('/permission', [\App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
Route::get('/permission/{id}/delete', [\App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');
Route::get('/permission/{int}/update', [\App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');

Route::get('/measure', [\App\Http\Controllers\MeasureController::class, 'index'])->name('measure.index');
Route::get('/measure/{id}/delete', [\App\Http\Controllers\MeasureController::class, 'destroy'])->name('measure.destroy');
Route::get('/measure/{int}/update', [\App\Http\Controllers\MeasureController::class, 'update'])->name('measure.update');


/////// temporary end pages
//Route::get('/manager', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');
Route::get('/manager_operations_record', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager_operations_record.index');
Route::get('/measure', [\App\Http\Controllers\MeasureController::class, 'index'])->name('measure.index');
Route::get('/positions_permissions', [\App\Http\Controllers\MeasureController::class, 'index'])->name('positions_permissions.index');
Route::get('/media_Library', [\App\Http\Controllers\MeasureController::class, 'index'])->name('media_Library.index');
Route::get('/bannares', [\App\Http\Controllers\MeasureController::class, 'index'])->name('bannares.index');
Route::get('/main_Sections', [\App\Http\Controllers\MeasureController::class, 'index'])->name('main_Sections.index');
Route::get('/sub_Sections', [\App\Http\Controllers\MeasureController::class, 'index'])->name('sub_Sections.index');
Route::get('/products', [\App\Http\Controllers\MeasureController::class, 'index'])->name('products.index');
Route::get('/clients', [\App\Http\Controllers\MeasureController::class, 'index'])->name('clients.index');
Route::get('/orders', [\App\Http\Controllers\MeasureController::class, 'index'])->name('orders.index');
Route::get('/measures', [\App\Http\Controllers\MeasureController::class, 'index'])->name('measures.index');
Route::get('/contact_iformation', [\App\Http\Controllers\MeasureController::class, 'index'])->name('contact_iformation.index');
Route::get('/social_media_link', [\App\Http\Controllers\MeasureController::class, 'index'])->name('social_media_link.index');
Route::get('/shipping_charge', [\App\Http\Controllers\MeasureController::class, 'index'])->name('shipping_charge.index');
Route::get('/bank_accounts', [\App\Http\Controllers\MeasureController::class, 'index'])->name('bank_accounts.index');
Route::get('/bank_transaction', [\App\Http\Controllers\MeasureController::class, 'index'])->name('bank_transaction.index');
Route::get('/comments', [\App\Http\Controllers\MeasureController::class, 'index'])->name('comments.index');
Route::get('/reports', [\App\Http\Controllers\MeasureController::class, 'index'])->name('reports.index');
Route::get('/notifications', [\App\Http\Controllers\MeasureController::class, 'index'])->name('notifications.index');
Route::get('/email_box', [\App\Http\Controllers\MeasureController::class, 'index'])->name('email_box.index');
//////////////////////////////






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
