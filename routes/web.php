<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SantaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/users', [SantaController::class, 'getUsersList'])->name('users.list');
    Route::post('/add-users/{user}', [SantaController::class, 'addUserToContest'])->name('users.add');
    Route::post('/delete-users/{user}', [SantaController::class, 'deleteUserFromContest'])->name('users.delete');
    Route::get('/mixing',[SantaController::class, 'mixingUsers'])->name('mixing');
    Route::get('/notifications', [NotificationController::class, 'getNotifictions'])->name('notifications');
});
Route::get('/logout',[SantaController::class, 'logOut'])->name('logout');



