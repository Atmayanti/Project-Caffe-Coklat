<?php

use App\Models\item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralPageController;
use App\Http\Controllers\UserController;

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


Route::get('/tes', function () {
    return view('tes', [
        'title' => 'Home',
        'item' => item::all(),
    ]);
})->middleware('auth');

// Route::middleware('auth')->group(function () {
//     Route::get('/', [GeneralPageController::class, 'index'])->name('index');
//     Route::get('/about', [GeneralPageController::class, 'about'])->name('about');
//     Route::get('/contact', [GeneralPageController::class, 'contact'])->name('contact');
//     Route::get('/product', [GeneralPageController::class, 'product'])->name('product');
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// });

Route::get('/', [GeneralPageController::class, 'index'])->name('index');
Route::get('/about', [GeneralPageController::class, 'about'])->name('about');
Route::get('/contact', [GeneralPageController::class, 'contact'])->name('contact');
Route::get('/product', [GeneralPageController::class, 'product'])->name('product');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login/google', [AuthController::class, 'redirectToGoole'])->name('loginwithgoogle');
    Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('loginwithgoogle');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/register', [AuthController::class, 'store']);
});


Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/table', [DashboardController::class, 'table'])->name('tabledashboard');
    Route::get('/utilities-color', [DashboardController::class, 'utilities_color']);
    Route::get('/utilities-border', [DashboardController::class, 'utilities_border']);
    Route::get('/utilities-animation', [DashboardController::class, 'utilities_animation']);
    Route::get('/utilities-other', [DashboardController::class, 'utilities_other']);
    Route::get('/buttons', [DashboardController::class, 'buttons']);
    Route::get('/cards', [DashboardController::class, 'cards']);
    Route::get('/charts', [DashboardController::class, 'charts']);
    Route::get('/blank', [DashboardController::class, 'blank'])->name('blank');
    Route::get('/404', [DashboardController::class, 'error_404'])->name('404');
    Route::get('/login', [DashboardController::class, 'login'])->name('dashboardlogin');
    Route::get('/register', [DashboardController::class, 'register'])->name('dashboardregister');
    Route::get('/forgot-password', [DashboardController::class, 'forgot_password'])->name('dashboardforgorpassword');
    Route::resource('/item', ItemController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/user', UserController::class);
});
