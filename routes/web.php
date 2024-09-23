<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Admin-Specific Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/borrowed-books', [AdminController::class, 'borrowedBooks'])->name('admin.borrowedBooks');
    Route::get('/admin/all-books', [AdminController::class, 'allBooks'])->name('admin.allBooks');
    Route::get('/admin/all-users', [AdminController::class, 'allUsers'])->name('admin.allUsers');
    Route::post('/admin/search-student', [AdminController::class, 'searchStudent'])->name('admin.searchStudent');
    Route::get('/edit-me/{id}', [PostController::class, 'edit'])->where(['id' => '[0-9]+'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->where(['id' => '[0-9]+'])->name('posts.update');
    Route::get('/create-post', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/delete-me/{id}', [PostController::class, 'delete'])->where(['id' => '[0-9]+'])->name('posts.delete');

});

// Student-Specific Routes
Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::post('/student/borrow-book/{id}', [StudentController::class, 'borrowBook'])->name('student.borrowBook');
    Route::post('/student/return-book/{id}', [StudentController::class, 'returnBook'])->name('student.returnBook');
    
});

// Shared Routes (for both roles)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/about-me', [PostController::class, 'about'])->name('about'); // Consolidated route
    Route::get('view/{id}', [PostController::class, 'show'])->where(['id' => '[0-9]+'])->name('posts.show');

});
