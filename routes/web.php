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

   // Guides Routes
   Route::get('/job-roles/{jobRole}/guides/create', [JobRoleController::class, 'createGuide'])->name('job-roles.guides.create');
   Route::get('/job-roles/{jobRole}/guides/{guide}/edit', [JobRoleController::class, 'editGuide'])->name('job-roles.guides.edit');
   Route::put('/job-roles/{jobRole}/guides/{guide}', [JobRoleController::class, 'updateGuide'])->name('job-roles.guides.update');
   Route::post('/job-roles/{jobRole}/guides', [JobRoleController::class, 'addGuide'])->name('job-roles.guides.store');
});
