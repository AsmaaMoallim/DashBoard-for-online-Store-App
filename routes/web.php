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
Route::get('/sub_sections/{int}/enableordisable', [\App\Http\Controllers\subSectionController::class, 'enableordisable'])->name('sub_Sections.index');
Route::get('/products/{int}/enableordisable', [\App\Http\Controllers\productController::class, 'enableordisable'])->name('products.enableordisable');
Route::get('/clients/{int}/enableordisable', [\App\Http\Controllers\clientController::class, 'enableordisable'])->name('clients.enableordisable');
Route::get('/orders/{int}/enableordisable', [\App\Http\Controllers\orderController::class, 'enableordisable'])->name('orders.enableordisable');
Route::get('/social_media_link/{int}/enableordisable', [\App\Http\Controllers\socialMediaLinksController::class, 'enableordisable'])->name('social_media_link.enableordisable');
Route::get('/sys_bank_account/{int}/enableordisable', [\App\Http\Controllers\bankAccountController::class, 'enableordisable'])->name('bank_accounts.enableordisable');
Route::get('/comments/{int}/enableordisable', [\App\Http\Controllers\commentController::class, 'enableordisable'])->name('comments.enableordisable');


////////////////////////////////////////////////////enableordisable state
Route::get('/manager/{int}/delete', [\App\Http\Controllers\ManagerController::class, 'delete'])->name('manager.delete');
Route::get('/positions_permissionsController/{int}/delete', [App\Http\Controllers\positions_permissionsController::class, 'delete'])->name('positions_permissionsController.delete');
Route::get('/media_library/{int}/delete', [App\Http\Controllers\MediaLibraryController::class, 'delete'])->name('media_Library.delete');
Route::get('/banners/{int}/delete', [App\Http\Controllers\bannerController::class, 'delete'])->name('banners.delete');
Route::get('/main_sections/{int}/delete', [\App\Http\Controllers\mainSectionController::class, 'delete'])->name('main_Sections.delete');
Route::get('/sub_sections/{int}/delete', [\App\Http\Controllers\subSectionController::class, 'delete'])->name('sub_Sections.delete');
Route::get('/products/{int}/delete', [\App\Http\Controllers\productController::class, 'delete'])->name('products.delete');
Route::get('/clients/{int}/delete', [\App\Http\Controllers\clientController::class, 'delete'])->name('clients.delete');
Route::get('/orders/{int}/delete', [\App\Http\Controllers\orderController::class, 'delete'])->name('orders.delete');
Route::get('/social_media_link/{int}/delete', [\App\Http\Controllers\socialMediaLinksController::class, 'delete'])->name('social_media_link.delete');
Route::get('/sys_bank_account/{int}/delete', [\App\Http\Controllers\bankAccountController::class, 'delete'])->name('bank_accounts.delete');
Route::get('/comments/{int}/delete', [\App\Http\Controllers\commentController::class, 'delete'])->name('comments.delete');


/////// temporary end pages
//Route::get('/manager', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');
//Route::get('/positions_permissionsController', [AppHttpControllersPermissionController::class, 'index'])->name('positions_permissionsController.index');



//tables
Route::get('/manager_operations_record', [\App\Http\Controllers\ManagerController::class, 'index'])->name('manager_operations_record.index');
Route::get('/positions_permissionsController', [App\Http\Controllers\positions_permissionsController::class, 'index'])->name('positions_permissionsController.index');
Route::get('/media_Library', [App\Http\Controllers\MediaLibraryController::class, 'index'])->name('media_Library.index');
Route::get('/banners', [App\Http\Controllers\bannerController::class, 'index'])->name('banners.index');
Route::get('/main_Sections', [\App\Http\Controllers\mainSectionController::class, 'index'])->name('main_Sections.index');
Route::get('/sub_Sections', [\App\Http\Controllers\subSectionController::class, 'index'])->name('sub_Sections.index');
Route::get('/products', [\App\Http\Controllers\productController::class, 'index'])->name('products.index');
Route::get('/clients', [\App\Http\Controllers\clientController::class, 'index'])->name('clients.index');
Route::get('/orders', [\App\Http\Controllers\orderController::class, 'index'])->name('orders.index');
Route::get('/measure', [App\Http\Controllers\MeasureController::class, 'index'])->name('measure.index');
Route::get('/contact_information', [\App\Http\Controllers\sysContactInfoController::class, 'index'])->name('contact_iformation.index');
Route::get('/social_media_link', [\App\Http\Controllers\socialMediaLinksController::class, 'index'])->name('social_media_link.index');
Route::get('/shipping_charge', [\App\Http\Controllers\shippingChargeController::class, 'index'])->name('shipping_charge.index');
Route::get('/bank_accounts', [\App\Http\Controllers\bankAccountController::class, 'index'])->name('bank_accounts.index');
Route::get('/bank_transaction', [\App\Http\Controllers\bankTransactionController::class, 'index'])->name('bank_transaction.index');
Route::get('/comments', [\App\Http\Controllers\commentController::class, 'index'])->name('comments.index');
Route::get('/notifications', [\App\Http\Controllers\notificationsController::class, 'index'])->name('notifications.index');
Route::get('/email_box', [\App\Http\Controllers\emailBoxController::class, 'index'])->name('email_box.index');




// go to forms
Route::get('manager/new-manager-form/insertData',[App\Http\Controllers\managerController::class,'insertData']);
Route::get('position/new-position-form/insertData',[App\Http\Controllers\positions_permissionsController::class,'insertData']);
Route::get('media_library/new-mediaLibrary-form/insertData',[App\Http\Controllers\MediaLibraryController::class,'insertData']);
Route::get('banners/new-banner-form/insertData',[App\Http\Controllers\bannerController::class,'insertData']);
Route::get('main_sections/new-maninSection-form/insertData',[App\Http\Controllers\mainSectionController::class,'insertData']);
Route::get('sub_sections/new-subSection-form/insertData',[App\Http\Controllers\subSectionController::class,'insertData']);
Route::get('products/new-product-form/insertData',[App\Http\Controllers\productController::class,'insertData']);
Route::get('clients/new-client-form/insertData',[App\Http\Controllers\clientController::class,'insertData']);
Route::get('measure/update-measures-form/insertData',[App\Http\Controllers\MeasureController::class,'insertData']);
Route::get('sys_bank_account/new-bank-account-form/insertData',[App\Http\Controllers\bankAccountController::class,'insertData']);
Route::get('notifications/new-notifications-form/insertData',[App\Http\Controllers\notificationsController::class,'insertData']);


// display
Route::get('manager/manager_operations_record/display', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager_operations_record.index');
Route::get('products/product_details/display', [App\Http\Controllers\productController::class, 'index'])->name('product_details.index');
Route::get('orders/order_details/display', [App\Http\Controllers\orderController::class, 'index'])->name('order_details.index');
Route::get('sys_info_phone/contact_info/display', [App\Http\Controllers\sysContactInfoController::class, 'index'])->name('sys_info_phone.index');
Route::get('comments/comment_reports/display', [App\Http\Controllers\reportController::class, 'index'])->name('comment_reports');
Route::get('email_box/email_display/display', [App\Http\Controllers\emailBoxController::class, 'index'])->name('email_box');


//save btn
Route::Post('/store-manager',[App\Http\Controllers\managerController::class,'store']);



//
////Ruba
//Route::post('/addManager', [App\Http\Controllers\managerController::class, 'addManager']);
////for testing edit
//Route::post('/update', [App\Http\Controllers\managerController::class, 'update']);
//Route::post('/TestEdit', [App\Http\Controllers\managerController::class, 'update']);
//Route::view('/new-role-form','new-role-form');
//Route::view('/new-photolibrary-form','new-photolibrary-form');
//Route::view('/new-banner-form','new-banner-form');
//Route::view('/new-mainDepartment-form','new-mainDepartment-form');
//Route::view('/new-subDepartment-form','new-subDepartment-form');
//Route::view('/new-client-form','new-client-form');
//Route::view('/new-social-media-form','new-social-media-form');
//Route::view('/new-bank-account-form','new-bank-account-form');
//Route::view('/new-product-form','new-product-form');
//Route::view('/measures-form','measures-form');
//Route::view('/notifications-form','notifications-form');
//Route::view('/TestEdit','TestEditting');
//
