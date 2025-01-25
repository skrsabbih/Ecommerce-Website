<?php
use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;
/** Admin Routes **/
Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
