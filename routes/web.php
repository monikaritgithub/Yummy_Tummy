<?php

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
    Route::get('/dashboard', function () {
        $user = auth()->user(); // Get the authenticated user

        if ($user->role === 0) {
            return view('/admin/adminDashboard');
        } elseif ($user->role === 1) {
            return view('/customer/customerDashboard'); 
        } else {
            // Handle other roles or cases as needed
            // You might want to return an error view or redirect to another page.
        }
    })->name('dashboard');
});

Route::resource('products', ProductController::class);


