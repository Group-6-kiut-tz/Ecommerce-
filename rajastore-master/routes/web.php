<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RajaStoreController;
use Illuminate\Support\Facades\Route;


//auth routes

Route::get('login',[AuthController::class,'login'])->middleware('guest')->name('login');
Route::post('login',[AuthController::class,'login'])->middleware('guest')->name('login');
Route::get('register',[AuthController::class,'register'])->middleware('guest')->name('register');
Route::post('register',[AuthController::class,'register'])->middleware('guest')->name('register');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('admindashboard',[AuthController::class, 'admindashboard'])->name('admin');

//other routes

Route::get('/',[RajaStoreController::class, 'index'])->name('home');
Route::post('/order',[RajaStoreController::class, 'viewOrder'])->name('vieworder');
Route::post('/save-product',[RajaStoreController::class,'saveProduct'])->name('saveProduct');
Route::get('/checkout',[RajaStoreController::class, 'checkout'])->name('checkout');
Route::get('/completePayement',[RajaStoreController::class, 'Payment'])->name('completePayment');
Route::delete('/removeFromCart',[RajaStoreController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('ProductView',[RajaStoreController::class, 'viewProduct'])->name('viewProduct');
Route::get('OrderView',[RajaStoreController::class, 'OrderList'])->name('Orderlist');
Route::get('shopProduct',[RajaStoreController::class, 'ShopNow'])->name('ShopNow');
Route::get('AddProduct',[RajaStoreController::class, 'UploadProduct'])->name('UploadProduct');
Route::get('/edit/{id}',[RajaStoreController::class, 'editProduct'])->name('editProduct');
Route::put('/update/{id}',[RajaStoreController::class, 'updateProduct'])->name('updateProduct');
Route::delete('/delete/{id}',[RajaStoreController::class, 'deleteProduct'])->name('deleteProduct');
Route::post('/complete-payment', [RajaStoreController::class, 'completePayment'])->name('completePayment');
Route::post('/finalPayment',[RajaStoreController::class, 'finalPay'])->name('finalPayment');



