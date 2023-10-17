<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController; // Import the AdminController

use Dompdf\Dompdf;
use Dompdf\Options;

// Public routes
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/questions/{category_id}', [CategoryController::class, 'getQuestionsPage'])->name('questions');
Route::post('/download-pdf/{category_id}', [CategoryController::class, 'downloadPDF'])->name('downloadPdf');

// Admin routes
Route::middleware(['admin'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin category management
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/admin/categories', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');

    // Admin question management
    Route::get('/admin/questions', [AdminController::class, 'questions'])->name('admin.questions');
    Route::post('/admin/questions', [AdminController::class, 'storeQuestion'])->name('admin.storeQuestion');
});

// Authentication routes (provided by Auth::routes())
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
