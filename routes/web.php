<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DndController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/edit/{id}', [DndController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [DndController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [DndController::class, 'destroy'])->name('destroy');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/setting/create', [SettingController::class, 'create'])->name('setting.create');
    Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');
    Route::get('/setting/edit/{id}', [SettingController::class, 'edit'])->name('setting.edit');
    Route::patch('/setting/update/{id}', [SettingController::class, 'update'])->name('setting.update');
    Route::delete('/setting/destroy/{id}', [SettingController::class, 'destroy'])->name('setting.destroy');

    Route::get('/dnd', [DndController::class, 'index'])->name('dnd.index');
    Route::get('/create', [DndController::class, 'create'])->name('dnd.create');
    Route::patch('/update/{id}', [SettingController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [SettingController::class, 'destroy'])->name('destroy');


    Route::get('/user', [ProfileController::class, 'user'])->name('user');
    Route::get('/user/create', [ProfileController::class, 'create'])->name('user.create');
    Route::post('/user/store', [ProfileController::class, 'store'])->name('user.store');
    Route::get('/user/permission/store', [ProfileController::class, 'storePermission'])->name('store.permission');
    Route::get('/user/ip-whitelist', [ProfileController::class, 'user'])->name('user.ip-whitelist');
    Route::get('/user/edit/{id}', [ProfileController::class, 'edit'])->name('user.edit');
    Route::get('/user/permission/{id}', [ProfileController::class, 'permssion'])->name('user.permission');
    Route::put('/user/update/{id}', [ProfileController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [ProfileController::class, 'destroy'])->name('user.delete');


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
