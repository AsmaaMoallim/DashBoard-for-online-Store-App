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
//Route::get('/manager/{id}/delete', [\App\Http\Controllers\ManagerController::class, 'destroy'])->name('manager.destroy');
//Route::get('/manager/{int}/enable_or_disable', [\App\Http\Controllers\ManagerController::class, 'enableOrdisable'])->name('manager.enableOrdisable');
//
//Route::get('/position', [\App\Http\Controllers\PositionController::class, 'index'])->name('position.index');
//Route::get('/position/{id}/delete', [\App\Http\Controllers\PositionController::class, 'destroy'])->name('position.destroy');
//Route::get('/position/{int}/enable_or_disable', [\App\Http\Controllers\PositionController::class, 'enableOrdisable'])->name('position.enableOrdisable');
//
//
//Route::get('/permission', [\App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
//Route::get('/permission/{id}/delete', [\App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');
//Route::get('/permission/{int}/enableordisable', [\App\Http\Controllers\PermissionController::class, 'enableordisable'])->name('permission.enableordisable');
//
//Route::get('/measure', [\App\Http\Controllers\MeasureController::class, 'index'])->name('measure.index');
//Route::get('/measure/{id}/delete', [\App\Http\Controllers\MeasureController::class, 'destroy'])->name('measure.destroy');
//Route::get('/measure/{int}/enable_or_disable', [\App\Http\Controllers\MeasureController::class, 'enableOrdisable'])->name('measure.enableOrdisable');


////////////////////////////////////////////////////enableordisable state
Route::get('/manager/{int}/enableordisable', [\App\Http\Controllers\ManagerController::class, 'enableordisable'])->name('manager.enableordisable');
Route::get('/positions_permissionsController/{int}/enableordisable', [App\Http\Controllers\positions_permissionsController::class, 'enableordisable'])->name('positions_permissionsController.enableordisable');
Route::get('/media_library/{int}/enableordisable', [App\Http\Controllers\MediaLibraryController::class, 'enableordisable'])->name('media_Library.enableordisable');
Route::get('/banners/{int}/enableordisable', [App\Http\Controllers\bannerController::class, 'enableordisable'])->name('banners.enableordisable');
Route::get('/main_sections/{int}/enableordisable', [\App\Http\Controllers\mainSectionController::class, 'enableordisable'])->name('main_Sections.enableordisable');
Route::get('/sub_sections/{int}/enableordisable', [\App\Http\Controllers\subSectionController::class, 'enableordisable'])->name('enableordisable.index');
Route::get('/products/{int}/enableordisable', [\App\Http\Controllers\productController::class, 'enableordisable'])->name('products.enableordisable');
Route::get('/clients/{int}/enableordisable', [\App\Http\Controllers\clientController::class, 'enableordisable'])->name('clients.enableordisable');
Route::get('/orders/{int}/enableordisable', [\App\Http\Controllers\orderController::class, 'enableordisable'])->name('orders.enableordisable');
Route::get('/social_media_link/{int}/enableordisable', [\App\Http\Controllers\socialMediaLinksController::class, 'enableordisable'])->name('social_media_link.enableordisable');
Route::get('/sys_bank_account/{int}/enableordisable', [\App\Http\Controllers\bankAccountController::class, 'enableordisable'])->name('bank_accounts.enableordisable');
Route::get('/comments/{int}/enableordisable', [\App\Http\Controllers\commentController::class, 'enableordisable'])->name('comments.enableordisable');


/////// temporary end pages
//Route::get('/manager', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');
Route::get('/manager_operations_record', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager_operations_record.index');
Route::get('/positions_permissionsController', [App\Http\Controllers\positions_permissionsController::class, 'index'])->name('positions_permissionsController.index');
//Route::get('/positions_permissionsController', [App\Http\Controllers\PermissionController::class, 'index'])->name('positions_permissionsController.index');
Route::get('/media_Library', [App\Http\Controllers\MediaLibraryController::class, 'index'])->name('media_Library.index');
Route::get('/banners', [App\Http\Controllers\bannerController::class, 'index'])->name('banners.index');
Route::get('/main_Sections', [\App\Http\Controllers\mainSectionController::class, 'index'])->name('main_Sections.index');
Route::get('/sub_Sections', [\App\Http\Controllers\subSectionController::class, 'index'])->name('sub_Sections.index');
Route::get('/products', [\App\Http\Controllers\productController::class, 'index'])->name('products.index');
Route::get('/clients', [\App\Http\Controllers\clientController::class, 'index'])->name('clients.index');
Route::get('/orders', [\App\Http\Controllers\orderController::class, 'index'])->name('orders.index');
Route::get('/measure', [App\Http\Controllers\MeasureController::class, 'index'])->name('measure.index');
Route::get('/orders', [App\Http\Controllers\productController::class, 'index'])->name('orders.index');
Route::get('/contact_iformation', [\App\Http\Controllers\clientController::class, 'contactinfo'])->name('contact_iformation.index');
Route::get('/social_media_link', [\App\Http\Controllers\socialMediaLinksController::class, 'index'])->name('social_media_link.index');
Route::get('/shipping_charge', [\App\Http\Controllers\shippingChargeController::class, 'index'])->name('shipping_charge.index');
Route::get('/bank_accounts', [\App\Http\Controllers\bankAccountController::class, 'index'])->name('bank_accounts.index');
Route::get('/bank_transaction', [\App\Http\Controllers\bankTransactionController::class, 'index'])->name('bank_transaction.index');
Route::get('/comments', [\App\Http\Controllers\commentController::class, 'index'])->name('comments.index');
Route::get('/notifications', [\App\Http\Controllers\notificationsController::class, 'index'])->name('notifications.index');
Route::get('/email_box', [\App\Http\Controllers\emailBoxController::class, 'index'])->name('email_box.index');
//////////////////////////////



// تابع ل ازرار الاضافة وسجل عمليات المدراء والتعليقات المتجاهلة
Route::get('manager/new-manager-form/insertData',[App\Http\Controllers\managerController::class,'insertData']);
Route::get('sub_section/new-subDepartment-form/insertData',[App\Http\Controllers\subSectionController::class,'insertData']);
Route::get('client/new-client-form/insertData',[App\Http\Controllers\clientController::class,'insertData']);
Route::get('position/new-role-form/insertData',[App\Http\Controllers\PositionController::class,'insertData']);
Route::get('social_media_link/new-social-media-form/insertData',[App\Http\Controllers\socialMediaLinksController::class,'insertData']);
Route::get('bank_accounts/new-bank-account-form/insertData',[App\Http\Controllers\bankAccountController::class,'insertData']);
Route::get('notifications/notifications-form/insertData',[App\Http\Controllers\notificationsController::class,'insertData']);

Route::get('manager/manager_operations_record/display', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager_operations_record.index');
Route::get('order/order_details/display', [App\Http\Controllers\orderController::class, 'index'])->name('order_details.index');
Route::get('product/product_details/display', [App\Http\Controllers\productController::class, 'index'])->name('product_details.index');
Route::get('comments/comment_reports/display', [App\Http\Controllers\reportController::class, 'index'])->name('comment_reports');




//////////////////////////////////////////////////Ruba
Route::get('/new-manager-form',[App\Http\Controllers\managerController::class,'insertData']);
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
