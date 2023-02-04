<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('admin.dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('home.user.index');
        Route::get('/user/add', 'create')->name('home.user.add');
        Route::post('/user/add', 'store')->name('home.user.store');
        Route::get('/user/edit/{user}', 'edit')->name('home.user.edit');
        Route::post('/user/edit/{user}', 'update')->name('home.user.update');
        Route::get('/user/delete/{user}', 'destroy')->name('home.user.delete');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile/{user}', 'profile_update')->name('profile.update');
        Route::get('admin/logout', 'logout')->name('logout');
    });

});

Route::middleware('guest')->controller(UserController::class)->group(function () {
    Route::get('/admin/login', 'login_view')->name('login');
    Route::post('/admin/login', 'login_store')->name('admin.login.store');
});
