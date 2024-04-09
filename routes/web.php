<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductUnitController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\StoreProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserProfileController;
use Illuminate\Support\Facades\Route;

/**
 * 2 , 1.15 , 1.20, 2.15 , 2.10 , 1.40
 * 3.15  , 2.30 , 0.40
 */

Route::get('/', function () {
    return redirect('admin/');
});

Route::get('/admin/loginPage', [AuthController::class, 'loginPage'])->name('admin.loginPage');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::view('/', "admin.index")->name('home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /* ****************           Company             *************** */
    Route::get('company/archive', [CompanyController::class, 'archive'])->name('company.archive');
    Route::delete('company/trash', [CompanyController::class, 'trash'])->name('company.trash');
    Route::post('company/restore', [CompanyController::class, 'restore'])->name('company.restore');
    Route::resource('company', CompanyController::class);


    /* ****************           Supplier             *************** */
    Route::get('supplier/archive', [SupplierController::class, 'archive'])->name('supplier.archive');
    Route::delete('supplier/trash', [SupplierController::class, 'trash'])->name('supplier.trash');
    Route::post('supplier/restore', [SupplierController::class, 'restore'])->name('supplier.restore');
    Route::resource('supplier', SupplierController::class);


    /* ****************           Store             *************** */
    Route::get('store/archive', [StoreController::class, 'archive'])->name('store.archive');
    Route::delete('store/trash', [StoreController::class, 'trash'])->name('store.trash');
    Route::post('store/restore', [StoreController::class, 'restore'])->name('store.restore');
    Route::resource('store', StoreController::class);


    /* ****************           Category             *************** */
    Route::get('category/archive', [CategoryController::class, 'archive'])->name('category.archive');
    Route::delete('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::post('category/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('category/tree', [CategoryController::class, 'tree'])->name('category.tree');
    Route::resource('category', CategoryController::class);

    /* ****************           Units             *************** */
    Route::get('unit/archive', [UnitController::class, 'archive'])->name('unit.archive');
    Route::delete('unit/trash', [UnitController::class, 'trash'])->name('unit.trash');
    Route::post('unit/restore', [UnitController::class, 'restore'])->name('unit.restore');
    Route::resource('unit', UnitController::class);


    /* ****************           ProductUnits             *************** */
    Route::get('productUnit/archive', [ProductUnitController::class, 'archive'])->name('productUnit.archive');
    Route::delete('productUnit/trash', [ProductUnitController::class, 'trash'])->name('productUnit.trash');
    Route::post('productUnit/restore', [ProductUnitController::class, 'restore'])->name('productUnit.restore');
    Route::resource('productUnit', ProductUnitController::class);


    /* ****************           Users             *************** */
    Route::get('user/archive', [UserController::class, 'archive'])->name('user.archive');
    Route::delete('user/trash', [UserController::class, 'trash'])->name('user.trash');
    Route::post('user/restore', [UserController::class, 'restore'])->name('user.restore');
    Route::resource('user', UserController::class);

    /* ****************           User Profile             *************** */
    Route::get('userProfile/create/{user}', [UserProfileController::class, 'create'])->name('userProfile.create');
    Route::post('userProfile/store', [UserProfileController::class, 'store'])->name('userProfile.store');

    /* ****************           productes             *************** */
    Route::get('product/archive', [ProductController::class, 'archive'])->name('product.archive');

    Route::delete('product/trash', [ProductController::class, 'trash'])->name('product.trash');

    Route::post('product/restore', [ProductController::class, 'restore'])->name('product.restore');

    Route::put('product/updateCategory/{product}', [ProductController::class, 'updateCategory'])->name('product.updateCategory');

    Route::put('product/updateSupplier/{product}', [ProductController::class, 'updateSupplier'])->name('product.updateSupplier');

    Route::get('product/changePublishStatus/{product}', [ProductController::class, 'changePublishStatus'])->name('product.changePublishStatus');

    Route::resource('product', ProductController::class);


    /* ****************           Roles             *************** */
    Route::get('role/archive', [RoleController::class, 'archive'])->name('role.archive');
    Route::delete('role/trash', [RoleController::class, 'trash'])->name('role.trash');
    Route::post('role/restore', [RoleController::class, 'restore'])->name('role.restore');
    Route::resource('role', RoleController::class);


    /* ****************           Permissions             *************** */
    Route::get('permission/index', [RolePermissionController::class, 'index'])->name('permission.index');
    Route::post('permission/addRolePermission', [RolePermissionController::class, 'addRolePermission'])->name('permission.addRolePermission');
    Route::get('permission/getRolePermissions/{role}', [RolePermissionController::class, 'getRolePermissions'])->name('permission.getRolePermissions');
    Route::get('permission/addRoleUserPage', [RolePermissionController::class, 'addRoleUserPage'])->name('permission.addRoleUserPage');
    Route::post('permission/addRoleUser', [RolePermissionController::class, 'addRoleUser'])->name('permission.addRoleUser');

    /* ****************           StoreProduct             *************** */
    Route::get('storeProduct/archive', [StoreProductController::class, 'archive'])->name('storeProduct.archive');
    Route::delete('storeProduct/trash', [StoreProductController::class, 'trash'])->name('storeProduct.trash');
    Route::post('storeProduct/restore', [StoreProductController::class, 'restore'])->name('storeProduct.restore');
    Route::get('ajax/ajaxGetStoreProductById', [StoreProductController::class, 'ajaxGetStoreProductById'])->name('ajax.storeProduct.ajaxGetStoreProductById');
    Route::get('ajax/ajaxHandleChangeOfOrderType', [StoreProductController::class, 'ajaxHandleChangeOfOrderType'])->name('ajax.storeProduct.ajaxHandleChangeOfOrderType');
    Route::resource('storeProduct', StoreProductController::class);


    /* ****************           ProductDetail             *************** */
    Route::get('productDetail/archive', [ProductDetailController::class, 'archive'])->name('productDetail.archive');
    Route::delete('productDetail/trash', [ProductDetailController::class, 'trash'])->name('productDetail.trash');
    Route::post('productDetail/restore', [ProductDetailController::class, 'restore'])->name('productDetail.restore');
    Route::resource('productDetail', ProductDetailController::class);


    /* ****************           Cart             *************** */
    Route::get('cart/archive', [CartController::class, 'archive'])->name('cart.archive');
    Route::delete('cart/trash', [CartController::class, 'trash'])->name('cart.trash');
    Route::post('cart/restore', [CartController::class, 'restore'])->name('cart.restore');
    Route::post('ajax/ajaxStoreCart', [CartController::class, 'ajaxStoreCart'])->name('ajax.cart.ajaxStoreCart');
    Route::resource('cart', CartController::class);


    /* ****************           Order             *************** */
    Route::get('order/archive', [OrderController::class, 'archive'])->name('order.archive');
    Route::delete('order/trash', [OrderController::class, 'trash'])->name('order.trash');
    Route::post('order/restore', [OrderController::class, 'restore'])->name('order.restore');
    Route::get('order/createOrderPage', [OrderController::class, 'createOrderPage'])->name('order.createOrderPage');
    Route::get('order/createOrder', [OrderController::class, 'createOrder'])->name('order.createOrder');
    Route::resource('order', OrderController::class);
});
