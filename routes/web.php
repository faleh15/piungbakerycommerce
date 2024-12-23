<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class, 'home'] );

Route::get('/dashboard',[HomeController::class, 'login_home'] )
->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin']);
route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth','admin']);
route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth','admin']);
route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth','admin']);
route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth','admin']);
route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth','admin']);
route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin']);
route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth','admin']);
route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth','admin']);

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);
Route::get('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);
Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);
Route::get('product_search', [AdminController::class, 'product_search'])->middleware(['auth', 'admin']);

Route::get('product_details/{id}' ,[HomeController::class,'product_details']);
Route::get('navbar_shop' ,[HomeController::class,'navbar_shop']);
Route::get('navbar_why' ,[HomeController::class,'navbar_why']);
Route::get('navbar_testimonial' ,[HomeController::class,'navbar_testimonial']);
Route::get('navbar_contact' ,[HomeController::class,'navbar_contact']);

Route::get('product_details/{id}' ,[HomeController::class,'product_details']);
Route::get('add_cart/{id}' ,[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
Route::get('mycart' ,[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified']);
Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);

Route::get('view_orders', [AdminController::class, 'view_orders'])->middleware(['auth', 'admin']);

