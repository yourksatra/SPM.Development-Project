<?php

use App\Http\Controllers\Admin\DataSPMController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\PuskesmasController;
use App\Http\Controllers\User\SPMController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes untuk halaman tamu dan fungsi autentikasi
Route::middleware(['web'])->group(function () {
    // Page guest
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/landasanHukum', [MainController::class, 'pagehukum'])->name('ldHukum');
    Route::get('/loginPage', [LoginController::class, 'index'])->name('login');

    // Function autentikasi
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authLogin');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Routes untuk admin dengan middleware auth dan role admin
Route::middleware(['web', 'auth', 'check.session.expiry'])->group(function () {
    Route::prefix('admin')->middleware('role:1')->group(function () {
        // Page admin
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('informasi', [AdminController::class, 'loginfo'])->name('admin.loginfo');
        Route::post('GantiUsername', [AdminController::class, 'username'])->name('admin.username');
        Route::post('GantiPassword', [AdminController::class, 'password'])->name('admin.password');
        
        // Function admin untuk puskesmas
        Route::get('puskesmas', [PuskesmasController::class, 'index'])->name('admin.puskesmas.index');
        Route::post('puskesmas/input', [PuskesmasController::class, 'storePuskesmas'])->name('puskesmas.store');
        Route::get('puskesmas/edit/{id}', [PuskesmasController::class, 'editPuskesmas'])->name('puskesmas.edit');
        Route::post('puskesmas/update/{id}', [PuskesmasController::class, 'updatePuskesmas'])->name('puskesmas.update');
        Route::post('puskesmas/delete/{id}', [PuskesmasController::class, 'deletePuskesmas'])->name('puskesmas.delete');

        // Function admin untuk operator
        Route::get('operator', [OperatorController::class, 'index'])->name('admin.operator.index');
        Route::get('operator/create', [OperatorController::class, 'create'])->name('admin.operator.create');
        Route::post('operator', [OperatorController::class, 'store'])->name('admin.operator.store');
        Route::put('operator/{id}', [OperatorController::class, 'update'])->name('admin.operator.update');
        Route::put('operator/status/{id}', [OperatorController::class, 'updateStatus'])->name('admin.operator.updateStatus');
        Route::put('operator/resetPassword/{id}', [OperatorController::class, 'resetPassword'])->name('admin.operator.resetPassword');

        // Function admin untuk data SPM (indikator dan target layanan)
        Route::get('Data-SPM', [DataSPMController::class, 'index'])->name('admin.dataSPM');
        Route::post('indikator/input', [DataSPMController::class, 'inputIndikator'])->name('admin.inputIndex');
        Route::post('indikator/edit/{id}', [DataSPMController::class, 'editIndikator'])->name('admin.editIndex');
        Route::post('indikator/delete/{id}', [DataSPMController::class, 'deleteIndikator'])->name('admin.deleteIndex');
        Route::get('targetlayanan', [DataSPMController::class, 'index'])->name('targetlayanan.index');
        Route::get('targetlayanan/create', [DataSPMController::class, 'createTarget'])->name('targetlayanan.create');
        Route::post('targetlayanan', [DataSPMController::class, 'storeTarget'])->name('targetlayanan.store');
        Route::get('targetlayanan/{IdPuskesmas}/{tahun}/edit', [DataSPMController::class, 'editTarget'])->name('targetlayanan.edit');
        Route::put('targetlayanan/{IdPuskesmas}/{tahun}', [DataSPMController::class, 'updateTarget'])->name('targetlayanan.update');
        
        // Function admin untuk data SPM (capaian)
        Route::get('CapaianSPM', [DataSPMController::class, 'dtCapaian'])->name('admin.capaian');
    });
});

// Routes untuk operator dengan middleware auth
Route::middleware(['web', 'auth', 'check.session.expiry'])->group(function () {
    Route::prefix('user')->middleware('role:0')->group(function () {
        // Page operator
        Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::get('panduan', [UserController::class, 'panduan'])->name('user.panduan');
    
        // Function user untuk DataSPM (Capaian)
        Route::get('capaianSPM', [SPMController::class, 'index'])->name('user.capaian.index');
        Route::get('capaianSPM/create', [SPMController::class, 'create'])->name('user.capaian.create');
        Route::post('inputCapaianSPM', [SPMController::class, 'store'])->name('user.capaian.store');
    });
});