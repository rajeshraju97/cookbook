<?php


use App\Http\Controllers\Admin\DishesController;
use App\Http\Controllers\Admin\DishtypeController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\user\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;



Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/signin', [UserController::class, 'signin'])->name('user.register');
Route::post('/signin', [UserController::class, 'register']);


Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserController::class, 'login'])->name('user.login');


Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/recipes', [HomeController::class, 'recipe'])->name('recipe');
Route::get('/recipe/{id}', [HomeController::class, 'recipe_single_page'])->name('recipe_single_page');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::prefix('user')
    ->name('user.')
    ->middleware('user.auth') // Use the alias here
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [DashboardController::class, 'dashboard'])->name('profile');
        Route::get('/settings', [DashboardController::class, 'dashboard'])->name('settings');
        Route::get('/get-ingredients/{dishId}/{members}', [RecipeController::class, 'getIngredients'])->name('get-ingredients');
        Route::post('/order-ingredients', [OrderController::class, 'addToCart'])->name('order.ingredients');
        Route::get('/cart', [OrderController::class, 'viewCart'])->name('cart');
        Route::post('/address/add', [UserController::class, 'addAddress'])->name('address.add');
        Route::post('/address/select', [UserController::class, 'selectAddress'])->name('address.select');

        Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
        Route::get('/order-confirmation', function () {
            return view('user.order-confirmation');
        });
        Route::post('/create-payment-order', [CheckoutController::class, 'createPaymentOrder'])->name('create-payment-order');

        Route::post('/update-order-status', [CheckoutController::class, 'updateOrderStatus'])->name('user.update-order-status');

        Route::delete('/cart/{id}', [CheckoutController::class, 'destroy'])->name('cart.destroy');


        Route::get('/test-razorpay', [CheckoutController::class, 'testRazorpay']);



    });



Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');



Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin.auth') // Use the alias here
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('ingredients', IngredientController::class);
        Route::resource('dish_type', DishtypeController::class);
        Route::resource('dishes', DishesController::class);
    });




