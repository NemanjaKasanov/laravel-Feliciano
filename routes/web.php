<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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

Route::middleware(['web'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dishes', [DishController::class, 'index'])->name('dishes');
    Route::get('/dish/{product}', [DishController::class, 'dish'])->name('dish');
    Route::post('/search', [DishController::class, 'search'])->name('search');
    Route::post('/get_likes_number', [DishController::class, 'getLikesNumber'])->name('getLikesNumber');
    Route::post('/get_comments', [DishController::class, 'getProductComments'])->name('getProductComments');

    Route::middleware(['logged_in'])->group(function(){
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('/getSizePrice', [DishController::class, 'getPrice'])->name('getSizePrice');
        Route::post('/add_to_cart', [OrderController::class, 'insertIntoCart'])->name('insertIntoCart');
        Route::post('/get_cart_items_number', [OrderController::class, 'getItemsInCartNumber'])->name('getItemsInCartNumber');
        Route::post('/like_product', [DishController::class, 'likeProduct'])->name('likeProduct');
        Route::post('/comment_product', [DishController::class, 'commentProduct'])->name('commentProduct');
        Route::get('/my_account', [AuthController::class, 'myAccount'])->name('myAccount');
        Route::post('/change_account_info', [AuthController::class, 'changeAccountInfo'])->name('changeAccountInfo');
        Route::get('/order', [OrderController::class, 'order'])->name('order');
        Route::delete('/delete_selected_order', [OrderController::class, 'deleteSelectedOrder'])->name('deleteSelectedOrder');
        Route::post('/submit_order', [OrderController::class, 'submitOrder'])->name('submitOrder');
        Route::get('/order_submit_success', [OrderController::class, 'submitOrderSuccess'])->name('submitOrderSuccess');

        Route::middleware(['employee'])->group(function(){
            Route::get('/change_product/{product}', [DishController::class, 'changeProductForm'])->name('changeProduct.form');
            Route::post('/change_product', [DishController::class, 'changeProduct'])->name('changeProduct');
            Route::delete('/delete_product/{product}', [DishController::class, 'deleteProduct'])->name('deleteProduct');
            Route::get('/add_product_form', [DishController::class, 'addProductForm'])->name('addProductForm');
            Route::post('/add_product', [DishController::class, 'addProduct'])->name('addProduct');
            Route::post('/add_price', [DishController::class, 'addPrice'])->name('addPrice');
            Route::delete('/delete_price', [DishController::class, 'deletePrice'])->name('deletePrice');
            Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
            Route::post('shipOrRefuse', [OrderController::class, 'shipOrRefuseOrder'])->name('shipOrRefuse');

            Route::middleware(['admin'])->group(function(){
                Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
                Route::get('/admin_accounts', [AdminController::class, 'admin_accounts'])->name('admin_accounts');
                Route::get('/admin_categories', [AdminController::class, 'admin_categories'])->name('admin_categories');
                Route::get('/admin_extras', [AdminController::class, 'admin_extras'])->name('admin_extras');
                Route::get('/admin_ingredients', [AdminController::class, 'admin_ingredients'])->name('admin_ingredients');
                Route::get('/admin_products', [AdminController::class, 'admin_products'])->name('admin_products');
                Route::get('/admin_orders', [AdminController::class, 'admin_orders'])->name('admin_orders');
                Route::get('/admin_comments', [AdminController::class, 'admin_comments'])->name('admin_comments');
                Route::get('/admin_links', [AdminController::class, 'admin_links'])->name('admin_links');
                Route::get('/admin_navs', [AdminController::class, 'admin_navs'])->name('admin_navs');
            });
        });
    });

    Route::middleware(['logged_out'])->group(function(){
        Route::get('/register_form', [AuthController::class, 'register_form'])->name('register.form');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::get('/login_form', [AuthController::class, 'login_form'])->name('login.form');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });

    Route::get('/error', [HomeController::class, 'error_page'])->name('error');
    Route::get('/no_access', [HomeController::class, 'no_access'])->name('no_access');
});
