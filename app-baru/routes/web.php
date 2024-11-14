<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MauMakanController;
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
    Route::resource('penjual',PenjualController::class);
    
    // mau makan apa?
    Route::get('mau-makan-apa',[MauMakanController::class,'index']); 
    Route::post('cari',[MauMakanController::class,'cari']);
});

require __DIR__.'/auth.php';
