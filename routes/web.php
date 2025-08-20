<?php

use Illuminate\Support\Facades\Route; //built in
use Illuminate\Support\Facades\Auth; //built in
use Illuminate\Support\Facades\Session; // built in

//Students
Route::group(['middleware' => 'auth', 'prefix' => 'student'], function () {
    Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index'])->middleware(['auth'])->name('student.dashboard');
    Route::view('/payment_history', 'controller.student_role.payment_history')->middleware(['auth'])->name('student.payment_history');
});
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/pos', [App\Http\Controllers\posController::class, 'index'])->middleware(['auth'])->name('admin.pos');
});
Route::get('/notification', [App\Http\Controllers\notificationController::class, 'index'])->middleware(['auth'])->name('student.notification');


/*
|------------------
| Web Routes
|------------------
|
*/
Route::get('/dashboard', function () {
    if (Auth::user()->role == 0) {
        return redirect()->route('student.dashboard');
    }
})->middleware(['auth']);


Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/logout', function () {
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/');
})->name('logout');
require __DIR__ . '/auth.php';
