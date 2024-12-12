<?php


use App\Http\Controllers\User\DashboardController;
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
Route::post('/login', [UserController::class, 'login'])->middleware('web')->name('user.login');


Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/recipe', [HomeController::class, 'recipe'])->name('recipe');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::name('user.')->middleware('auth:user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'dashboard'])->name('profile');
    Route::get('/settings', [DashboardController::class, 'dashboard'])->name('settings');
    Route::get('/get-ingredients/{dishId}/{members}', [RecipeController::class, 'getIngredients'])->name('get-ingredients');
    Route::post('/order-ingredients', [RecipeController::class, 'orderIngredients'])->name('order.ingredients');
});




Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->middleware('web')->name('admin.login');


Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('ingredients', IngredientController::class);
});



