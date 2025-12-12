<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\roomsController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\transactionController;

Route::get('/', function () {
    return view('home');
});

// Auth
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Redirect to proper dashboard
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    })->name('dashboard.redirect');

    // User area
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('dashboard', function () { return view('user.dashboard'); })->name('dashboard');
        Route::get('rooms', [roomsController::class, 'index'])->name('rooms.index');
        Route::get('rooms/{room}', [roomsController::class, 'show'])->name('rooms.show');
        Route::get('booking/create/{room?}', [bookingController::class, 'create'])->name('booking.create');
        Route::post('booking', [bookingController::class, 'store'])->name('booking.store');
        Route::get('booking/history', [bookingController::class, 'history'])->name('booking.history');
        Route::get('profile', [usersController::class, 'profile'])->name('profile');
        Route::post('profile', [usersController::class, 'updateProfile'])->name('profile.update');
    });

    // Admin area
    Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
        Route::resource('rooms', roomsController::class);
        Route::resource('services', servicesController::class);
        Route::get('bookings', [bookingController::class, 'index'])->name('bookings.index');
        Route::get('transactions', [transactionController::class, 'index'])->name('transactions.index');
        Route::resource('users', usersController::class)->only(['index','edit','update','destroy']);
    });
});
