<?php

use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\Admin\KelolaAdmin;
use App\Http\Controllers\Admin\KelolaMahasiswa;
use App\Http\Controllers\Admin\KelolaStaff;
use App\Http\Controllers\Auth\Login;
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

    Route::group(['middleware' => 'mahasiswa'], function () {
        Route::get('/dashboard-mahasiswa', [Dashboard::class, 'index'])->name('dashboard-mahasiswa');
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

        // Kelola mahasiswa
        Route::get('/daftar-mahasiswa', [KelolaMahasiswa::class, 'index'])->name('daftar-mahasiswa');
        Route::get('/tambah-mahasiswa', [KelolaMahasiswa::class, 'tambah'])->name('tambah-mahasiswa');
        Route::post('/tambah-mahasiswa', [KelolaMahasiswa::class, 'prosesTambah']);
        Route::get('/edit-mahasiswa/{id}', [KelolaMahasiswa::class, 'edit'])->name('edit-mahasiswa');
        Route::post('/edit-mahasiswa/{id}', [KelolaMahasiswa::class, 'prosesEdit']);
        Route::get('/hapus-mahasiswa/{id}', [KelolaMahasiswa::class, 'prosesHapus']);

        // Kelola staff
        Route::get('/daftar-staff', [KelolaStaff::class, 'index'])->name('daftar-staff');
        Route::get('/tambah-staff', [KelolaStaff::class, 'tambah'])->name('tambah-staff');
        Route::post('/tambah-staff', [KelolaStaff::class, 'prosesTambah']);
        Route::get('/edit-staff/{id}', [KelolaStaff::class, 'edit'])->name('edit-staff');
        Route::post('/edit-staff/{id}', [KelolaStaff::class, 'prosesEdit']);
        Route::get('/hapus-staff/{id}', [KelolaStaff::class, 'prosesHapus']);
    });

    Route::group(['middleware' => 'staff'], function () {
        Route::get('/dashboard-staff', [Dashboard::class, 'staff'])->name('dashboard-staff');
    });
});
