<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

//Students
Route::group(['middleware' => ['auth', 'role:0'], 'prefix' => 'student'], function () {
    Route::post('/impr_info', [App\Http\Controllers\Controller::class, 'impr_info'])->middleware(['auth'])->name('student.impr_info');
    Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index'])->middleware(['auth'])->name('student.dashboard');
    Route::view('/payment_history', 'controller.student_role.payment_history')->middleware(['auth'])->name('student.payment_history');
});
//Admin
Route::group(['middleware' => ['auth', 'role:1'], 'prefix' => 'admin'], function () {
    Route::match(['get', 'post'], '/pos', [App\Http\Controllers\posController::class, 'index'])->name('admin.pos');
    Route::post('/pos_payment', [App\Http\Controllers\posController::class, 'payment'])->name('admin.pos.payment_submit');
    Route::post('/pos_newpayment', [App\Http\Controllers\posController::class, 'newpayment'])->name('admin.pos.newpayment_submit');
});
Route::get('/notification', [App\Http\Controllers\notificationController::class, 'index'])->middleware(['auth'])->name('student.notification');


/*
|------------------
| Web Routes
|------------------
|
*/
Route::get('/dashboard', function () {
    return redirect()->route('student.dashboard');
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
