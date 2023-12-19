<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard-default', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    Route::get('/dashboard', function () {
        return view('pages.dashboard-general-dashboard');
    })->name('dashboard');
    // Route::get('/user', [UserController::class, 'index'])->name('user');

    Route::resource('/user', UserController::class);
    Route::resource('/products', ProductController::class);

});
