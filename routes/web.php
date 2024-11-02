<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopgridController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/',[ShopgridController::class,'index'])->name('home');
Route::get('product-category',[ShopgridController::class,'category'])->name('product.category');
Route::get('product-detail',[ShopgridController::class,'product'])->name('product.detail');

Route::get('Cart',[CartController::class,'index'])->name('cart.show');
Route::get('checkout-page',[CheckoutController::class,'index'])->name('product-checkout');

Route::get('customer-login',[CustomerAuthController::class,'login'])->name('customer.login');
Route::get('customer-register',[CustomerAuthController::class,'register'])->name('customer.register');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category/add',[CategoryController::class,'create'])->name('category.add');
    Route::get('/category/Manage',[CategoryController::class,'index'])->name('category.manage');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    Route::get('/subcategory/add',[SubCategoryController::class,'create'])->name('subcategory.add');
    Route::get('/subcategory/manage',[SubCategoryController::class,'index'])->name('subcategory.manage');
    Route::post('/subcategory/store',[SubCategoryController::class,'store'])->name('subcategory.store');
    Route::get('/subcategory/edit{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
    Route::get('/subcategory/delete{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');

    Route::get('/brand/add',[BrandController::class,'create'])->name('brand.add');
    Route::get('/brand/manage',[BrandController::class,'index'])->name('brand.manage');
    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('/brand/edit{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/update{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('/brand/delete{id}',[BrandController::class,'delete'])->name('brand.delete');



    Route::get('/unit/add',[UnitController::class,'create'])->name('unit.add');
    Route::get('/unit/manage',[UnitController::class,'index'])->name('unit.manage');

    Route::get('/product/add',[ProductController::class,'create'])->name('product.add');
    Route::get('/product/manage',[ProductController::class,'index'])->name('product.manage');

    Route::get('/order/add',[OrderController::class,'create'])->name('order.add');
    Route::get('/order/manage',[OrderController::class,'index'])->name('order.manage');

});
