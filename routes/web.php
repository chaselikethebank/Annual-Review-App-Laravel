<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobRoleController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

     // Job Roles Management Routes (CRUD)
     Route::resource('job-roles', JobRoleController::class);
});
