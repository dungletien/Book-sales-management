<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Quản lý sách
Route::resource('books', BookController::class);

// Đảm bảo tất cả các route sử dụng books. (thống nhất với resource)
Route::get('/books', [BookController::class, 'index'])->name('books.index'); // Danh sách sách
Route::get('books/create', [BookController::class, 'create'])->name('books.create'); // Form thêm sách
Route::post('books', [BookController::class, 'store'])->name('books.store'); // Lưu sách mới
Route::get('books/{book}', [BookController::class, 'show'])->name('books.show'); // Xem chi tiết sách
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit'); // Form chỉnh sửa sách
Route::put('books/{book}', [BookController::class, 'update'])->name('books.update'); // Cập nhật sách
Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy'); // Xóa sách


// Quản lý đơn hàng
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit'); // Sửa lại từ books -> orders
Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update'); // Sửa lại từ books -> orders
Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Dashboard tổng doanh thu
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
require __DIR__.'/auth.php';
