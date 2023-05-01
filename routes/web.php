<?php

use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\Admin\KelolaAdmin;
use App\Http\Controllers\Admin\KelolaMahasiswa;
use App\Http\Controllers\Admin\KelolaStaff;
use App\Http\Controllers\Admin\Log;
use App\Http\Controllers\Admin\KelompokUKT;
use App\Http\Controllers\Admin\Kriteria;
use App\Http\Controllers\Admin\NilaiKriteria;
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

    // lupa password
    Route::get('/lupa-password', [Login::class, 'lupaPassword'])->name('lupa-password');
    Route::get('/lupa-password-admin', [Login::class, 'lupaPassword'])->name('lupa-password-admin');
    Route::get('/lupa-password-staff', [Login::class, 'lupaPassword'])->name('lupa-password-staff');

    // Logout
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'mahasiswa'], function () {
        Route::get('/dashboard-mahasiswa', [Dashboard::class, 'index'])->name('dashboard-mahasiswa');

        // PROFIL
        Route::get('/profil-mahasiswa', [KelolaMahasiswa::class, 'profil'])->name('profil-mahasiswa');
        Route::post('/edit-profil-mahasiswa/{id}', [KelolaMahasiswa::class, 'prosesEditProfil']);
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard-admin', [Dashboard::class, 'admin'])->name('dashboard-admin');

        // Kelola Admin
        Route::get('/daftar-admin', [KelolaAdmin::class, 'index'])->name('daftar-admin');
        Route::get('/tambah-admin', [KelolaAdmin::class, 'tambah'])->name('tambah-admin');
        Route::post('/tambah-admin', [KelolaAdmin::class, 'prosesTambah']);
        Route::get('/edit-admin/{id}', [KelolaAdmin::class, 'edit'])->name('edit-admin');
        Route::post('/edit-admin/{id}', [KelolaAdmin::class, 'prosesEdit']);
        Route::get('/hapus-admin/{id}', [KelolaAdmin::class, 'prosesHapus']);
        Route::get('/profil-admin', [KelolaAdmin::class, 'profil'])->name('profil-admin');
        Route::post('/edit-profil-admin/{id}', [KelolaAdmin::class, 'prosesEditProfil']);

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

        // data log
        Route::get('/daftar-log', [Log::class, 'index'])->name('daftar-log');

        // kelola kelompok UKT
        Route::get('/daftar-kelompok-ukt', [KelompokUKT::class, 'index'])->name('daftar-kelompok-ukt');
        Route::get('/tambah-kelompok-ukt', [KelompokUKT::class, 'tambah'])->name('tambah-kelompok-ukt');
        Route::post('/tambah-kelompok-ukt', [KelompokUKT::class, 'prosesTambah']);
        Route::get('/edit-kelompok-ukt/{id}', [KelompokUKT::class, 'edit'])->name('edit-kelompok-ukt');
        Route::post('/edit-kelompok-ukt/{id}', [KelompokUKT::class, 'prosesEdit']);
        Route::get('/hapus-kelompok-ukt/{id}', [KelompokUKT::class, 'prosesHapus']);

        // kelola kriteria
        Route::get('/daftar-kriteria', [Kriteria::class, 'index'])->name('daftar-kriteria');
        Route::get('/tambah-kriteria', [Kriteria::class, 'tambah'])->name('tambah-kriteria');
        Route::post('/tambah-kriteria', [Kriteria::class, 'prosesTambah']);
        Route::get('/edit-kriteria/{id}', [Kriteria::class, 'edit'])->name('edit-kriteria');
        Route::post('/edit-kriteria/{id}', [Kriteria::class, 'prosesEdit']);
        Route::get('/hapus-kriteria/{id}', [Kriteria::class, 'prosesHapus']);

        // kelola nilai kriteria
        Route::get('/daftar-nilai-kriteria', [NilaiKriteria::class, 'index'])->name('daftar-nilai-kriteria');
        Route::get('/tambah-nilai-kriteria', [NilaiKriteria::class, 'tambah'])->name('tambah-nilai-kriteria');
        Route::post('/tambah-nilai-kriteria', [NilaiKriteria::class, 'prosesTambah']);
        Route::get('/edit-nilai-kriteria/{id}', [NilaiKriteria::class, 'edit'])->name('edit-nilai-kriteria');
        Route::post('/edit-nilai-kriteria/{id}', [NilaiKriteria::class, 'prosesEdit']);
        Route::get('/hapus-nilai-kriteria/{id}', [NilaiKriteria::class, 'prosesHapus']);
    });

    Route::group(['middleware' => 'staff'], function () {
        Route::get('/dashboard-staff', [Dashboard::class, 'staff'])->name('dashboard-staff');

        // PROFIL
        Route::get('/profil-staff', [KelolaStaff::class, 'profil'])->name('profil-staff');
        Route::post('/edit-profil-staff/{id}', [KelolaStaff::class, 'prosesEditProfil']);
    });
});
