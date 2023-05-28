<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('verify', function () {
    return view('auth.verify');
})->name('verify_email');

Auth::routes(['verify' => true, 'login' => false, 'register' => false]);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/user/signin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/user/signin', [LoginController::class, 'login']);

Route::get('/user/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/user/signup', [RegisterController::class, 'register']);

Route::group(
    ['prefix' => "/auth/", "middleware" => ["auth", 'checkMail']],
    function () {
        Route::get('', [HomeController::class, 'index'])->name('auth');
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::get('my-profile', [UserController::class, 'editprofile'])->name('myprofile');
        Route::put('edit-my-profile', [UserController::class, 'updatemyprofile'])->name('updatemyprofile');
    }
);
