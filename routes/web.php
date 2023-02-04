<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/kegiatan/{kegiatan:slug_kegiatan}', 'detail_kegiatan')->name('home.kegiatan.detail');
    Route::get('/wisata/{wisata:slug_wisata}', 'detail_wisata')->name('home.wisata.detail');
    Route::get('/staff', 'staff');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('admin.dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::controller(KegiatanController::class)->group(function () {
        Route::get('/kegiatan', 'index')->name('admin.kegiatan.index');
        Route::get('/kegiatan/add', 'create')->name('admin.kegiatan.add');
        Route::post('/kegiatan/add', 'store')->name('admin.kegiatan.store');
        Route::get('/kegiatan/show/{kegiatan}', 'show')->name('admin.kegiatan.show');
        Route::get('/kegiatan/edit/{kegiatan}', 'edit')->name('admin.kegiatan.edit');
        Route::post('/kegiatan/edit/{kegiatan}', 'update')->name('admin.kegiatan.update');
        Route::get('/kegiatan/delete/{kegiatan}', 'destroy')->name('admin.kegiatan.delete');
    });

    Route::controller(WisataController::class)->group(function () {
        Route::get('/wisata', 'index')->name('admin.wisata.index');
        Route::get('/wisata/add', 'create')->name('admin.wisata.add');
        Route::post('/wisata/add', 'store')->name('admin.wisata.store');
        Route::get('/wisata/show/{wisata}', 'show')->name('admin.wisata.show');
        Route::get('/wisata/edit/{wisata}', 'edit')->name('admin.wisata.edit');
        Route::post('/wisata/edit/{wisata}', 'update')->name('admin.wisata.update');
        Route::get('/wisata/delete/{wisata}', 'destroy')->name('admin.wisata.delete');
    });

    Route::controller(StaffController::class)->group(function () {
        Route::get('/staff', 'index')->name('admin.staff.index');
        Route::get('/staff/add', 'create')->name('admin.staff.add');
        Route::post('/staff/add', 'store')->name('admin.staff.store');
        Route::get('/staff/show/{staff}', 'show')->name('admin.staff.show');
        Route::get('/staff/edit/{staff}', 'edit')->name('admin.staff.edit');
        Route::post('/staff/edit/{staff}', 'update')->name('admin.staff.update');
        Route::get('/staff/delete/{staff}', 'destroy')->name('admin.staff.delete');
    });

    Route::controller(ImageController::class)->group(function () {
        Route::get('/gambar/add/kegiatan/{kegiatan}', 'create_kegiatan')->name('admin.gambar.add.kegiatan');
        Route::get('/gambar/add/wisata/{wisata}', 'create_wisata')->name('admin.gambar.add.wisata');
        Route::post('/gambar/add', 'store')->name('admin.gambar.store');
        Route::get('/gambar/edit/{gambar}', 'edit')->name('admin.gambar.edit');
        Route::post('/gambar/edit/{gambar}', 'update')->name('admin.gambar.update');
        Route::get('/gambar/delete/{gambar}', 'destroy')->name('admin.gambar.delete');
    });

    Route::controller(TiketController::class)->group(function () {
        Route::get('/tiket/add/{wisata}', 'create')->name('admin.tiket.add');
        Route::post('/tiket/add', 'store')->name('admin.tiket.store');
        Route::get('/tiket/edit/{tiket}', 'edit')->name('admin.tiket.edit');
        Route::post('/tiket/edit/{tiket}', 'update')->name('admin.tiket.update');
        Route::get('/tiket/delete/{tiket}', 'destroy')->name('admin.tiket.delete');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('admin.user.index');
        Route::get('/user/add', 'create')->name('admin.user.add');
        Route::post('/user/add', 'store')->name('admin.user.store');
        Route::get('/user/edit/{user}', 'edit')->name('admin.user.edit');
        Route::post('/user/edit/{user}', 'update')->name('admin.user.update');
        Route::get('/user/delete/{user}', 'destroy')->name('admin.user.delete');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile/{user}', 'profile_update')->name('profile.update');
        Route::get('admin/logout', 'logout')->name('logout');
    });

});

Route::middleware('guest')->controller(UserController::class)->group(function () {
    Route::get('/admin/login', 'login_view')->name('login');
    Route::post('/admin/login', 'login_store')->name('admin.login.store');
});
