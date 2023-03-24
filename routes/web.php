<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\KelolaAdmin;
use App\Http\Controllers\KelolaUser;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login;
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

Route::group(['middleware' => 'revalidate'], function () {

    // Home
    // Route::get('/', [Home::class, 'index'])->name('landing');

    // Login User
    Route::get('/', [Login::class, 'index'])->name('login');
    Route::get('/admin', [Login::class, 'admin'])->name('admin');
    Route::get('/staff', [Login::class, 'staff'])->name('staff');
    Route::post('/login', [Login::class, 'loginProcess']);

    // Logout
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'user'], function () {
        Route::get('/dashboard-user', [Dashboard::class, 'index'])->name('dashboard-user');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard-admin', [Dashboard::class, 'admin'])->name('dashboard-admin');

        // Kelola Admin
        Route::get('/kelola-admin', [KelolaAdmin::class, 'index'])->name('kelola-admin');
        Route::get('/tambah-admin', [KelolaAdmin::class, 'tambah'])->name('tambah-admin');
        Route::post('/tambah-admin', [KelolaAdmin::class, 'prosesTambah']);
        Route::get('/edit-admin/{id}', [KelolaAdmin::class, 'edit'])->name('edit-admin');
        Route::post('/edit-admin/{id}', [KelolaAdmin::class, 'prosesEdit']);
        Route::get('/hapus-admin/{id}', [KelolaAdmin::class, 'prosesHapus']);

        // Kelola User
        Route::get('/daftar-user', [KelolaUser::class, 'index'])->name('daftar-user');
        Route::get('/tambah-user', [KelolaUser::class, 'tambah'])->name('tambah-user');
        Route::post('/tambah-user', [KelolaUser::class, 'prosesTambah']);
        Route::get('/edit-user/{id}', [KelolaUser::class, 'edit'])->name('edit-user');
        Route::post('/edit-user/{id}', [KelolaUser::class, 'prosesEdit']);
        Route::get('/detail-user/{id}', [KelolaUser::class, 'detail'])->name('detail-user');
        Route::get('/hapus-user/{id}', [KelolaUser::class, 'prosesHapus']);
    });

    Route::group(['middleware' => 'staff'], function () {
        Route::get('/dashboard-staff', [Dashboard::class, 'staff'])->name('dashboard-staff');
    });
});
