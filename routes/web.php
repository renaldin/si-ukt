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

    // Register
    Route::get('/register', [Register::class, 'index'])->name('register');
    Route::post('/register', [Register::class, 'registerProcess']);

    // Login User
    Route::get('/', [Login::class, 'index'])->name('login');
    Route::get('/admin', [Login::class, 'admin'])->name('admin');
    Route::post('/login', [Login::class, 'loginProcess']);

    // Logout
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'user'], function () {
        Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboardUser');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboardAdmin', [Dashboard::class, 'admin'])->name('dashboardAdmin');

        // Kelola Admin
        Route::get('/kelola-admin', [KelolaAdmin::class, 'index'])->name('kelola-admin');
        Route::get('/tambah-admin', [KelolaAdmin::class, 'tambah'])->name('tambah-admin');
        Route::post('/tambah-admin', [KelolaAdmin::class, 'prosesTambah']);
        Route::get('/edit-admin/{id}', [KelolaAdmin::class, 'edit'])->name('edit-admin');
        Route::post('/edit-admin/{id}', [KelolaAdmin::class, 'prosesEdit']);
        Route::get('/hapus-admin/{id}', [KelolaAdmin::class, 'prosesHapus']);

        // Kelola User
        Route::get('/kelola-user', [KelolaUser::class, 'index'])->name('kelola-user');
        Route::get('/tambah-user', [KelolaUser::class, 'tambah'])->name('tambah-user');
        Route::post('/tambah-user', [KelolaUser::class, 'prosesTambah']);
        Route::get('/edit-user/{id}', [KelolaUser::class, 'edit'])->name('edit-user');
        Route::post('/edit-user/{id}', [KelolaUser::class, 'prosesEdit']);
        Route::get('/detail-user/{id}', [KelolaUser::class, 'detail'])->name('detail-user');
        Route::get('/hapus-user/{id}', [KelolaUser::class, 'prosesHapus']);
    });
});
