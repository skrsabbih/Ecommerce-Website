<?php
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\vendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use Illuminate\Support\Facades\Route;
/** Vendor Routes **/
Route::get('dashboard',[VendorController::class,'dashboard'])->name('dashboard');
Route::get('profile',[vendorProfileController::class,'index'])->name('profile');
Route::put('profile', [vendorProfileController::class, 'updateProfile'])->name('profile.update');//vendor.profile.update
Route::post('profile', [vendorProfileController::class, 'updatePassword'])->name('profile.update.password');//vendor.profile.update.password

/** Vendor shop profile  */
Route::resource('shop-profile', VendorShopProfileController::class);
/** Product Routes */
Route::get('product/get-subcategories', [VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [VendorProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::put('product/change-status', [VendorProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products', VendorProductController::class);

/** Products image gallery route */
Route::resource('products-image-gallery', VendorProductImageGalleryController::class);

/** Products variant route */
Route::put('products-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', VendorProductVariantController::class);