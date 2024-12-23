<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobRoleController;
use App\Http\Controllers\HierarchyController;
use App\Http\Controllers\Controller;


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

   // User routes

   // Hierarchy Routes
   Route::get('/hierarchy', [HierarchyController::class, 'index'])->name('hierarchy.index');

   Route::get('/hierarchy/assign', [HierarchyController::class, 'assign'])->name('hierarchy.assign');
   Route::post('/hierarchy/assign', [HierarchyController::class, 'store'])->name('hierarchy.store');

   // Job Roles Management Routes
   Route::get('/job-roles/assign', [JobRoleController::class, 'assign'])->name('job-roles.assign');
   Route::post('/job-roles/assign', [JobRoleController::class, 'storeAssign'])->name('job-roles.store.assign');

   Route::post('/job-roles/{jobRoleId}/assign-user', [JobRoleController::class, 'assignUserToJobRole'])->name('job-roles.assign-user');
   Route::post('/job-roles/{jobRoleId}/remove-user', [JobRoleController::class, 'removeUserFromJobRole'])->name('job-roles.remove-user');

   Route::resource('job-roles', JobRoleController::class);
   // Guides Routes
   Route::get('/job-roles/{jobRole}/guides/create', [JobRoleController::class, 'createGuide'])->name('job-roles.guides.create');
   Route::get('/job-roles/{jobRole}/guides/{guide}/edit', [JobRoleController::class, 'editGuide'])->name('job-roles.guides.edit');
   Route::put('/job-roles/{jobRole}/guides/{guide}', [JobRoleController::class, 'updateGuide'])->name('job-roles.guides.update');
   Route::post('/job-roles/{jobRole}/guides', [JobRoleController::class, 'addGuide'])->name('job-roles.guides.store');
   //


});
