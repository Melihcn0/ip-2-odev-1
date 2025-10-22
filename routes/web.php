<?php

use App\Http\Controllers\ContactHrController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'Home']);
Route::get('/about',[PagesController::class, 'About']);
Route::get('/departments',[PagesController::class, 'Departments']);
Route::get('/news',[PagesController::class, 'News']);
Route::get('/contactUs', [ContactUsController::class, 'index'])->name('contactUs.index');
Route::post('/contactUs', [ContactUsController::class, 'store'])->name('contactUs.store');
Route::get('/contactHr',[ContactHrController::class,'index'])->name('contactHr.index');
Route::post('/contactHr', [ContactHrController::class, 'store'])->name('contactHr.store');

