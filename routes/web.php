<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');

    // data penjual
    Route::get('penjual',[PenjualController::class , 'index']);
    Route::get('penjual/create',[PenjualController::class , 'create']);
    Route::post('penjual/store',[PenjualController::class , 'store']);
    Route::get('penjual/{id}/edit',[PenjualController::class , 'edit']);

});

require __DIR__.'/auth.php';
