<?php
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\vendorProfileController;
use Illuminate\Support\Facades\Route;
/** Vendor Routes **/
Route::get('dashboard',[VendorController::class,'dashboard'])->name('dashboard');
Route::get('profile',[vendorProfileController::class,'index'])->name('profile');
Route::put('profile', [vendorProfileController::class, 'updateProfile'])->name('profile.update');//vendor.profile.update
Route::post('profile', [vendorProfileController::class, 'updatePassword'])->name('profile.update.password');//vendor.profile.update.password