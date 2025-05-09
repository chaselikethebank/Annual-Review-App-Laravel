<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobRoleController;
use App\Http\Controllers\HierarchyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BehavioralController;
use App\Http\Controllers\QualifierController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\GeneralQualifierController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // User routes

    // Hierarchy Routes
    Route::get('/hierarchy', [HierarchyController::class, 'index'])->name('hierarchy.index');

    Route::get('/hierarchy/assign', [HierarchyController::class, 'assign'])->name('hierarchy.assign');
    Route::post('/hierarchy/assign', [HierarchyController::class, 'store'])->name('hierarchy.store');

    // Guides Routes
    Route::get('/job-roles/{jobRole}/guides/create', [JobRoleController::class, 'createGuide'])->name('job-roles.guides.create');
    Route::get('/job-roles/{jobRole}/guides/{guide}/edit', [JobRoleController::class, 'editGuide'])->name('job-roles.guides.edit');
    Route::put('/job-roles/{jobRole}/guides/{guide}', [JobRoleController::class, 'updateGuide'])->name('job-roles.guides.update');
    Route::post('/job-roles/{jobRole}/guides', [JobRoleController::class, 'addGuide'])->name('job-roles.guides.store');
    //

    // Reviews
    Route::resource('reviews', ReviewController::class);
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');

    // // Assessments 
    // Route::resource('assessments', AssessmentController::class);
    // Route::get('/assessments', [AssessmentController::class, 'index'])->name('assessments.index');
    // Route::get('/assessments/create/{reviewId}', [AssessmentController::class, 'create'])->name('assessments.create');
    // Route::post('/assessments/store', [AssessmentController::class, 'store'])->name('assessment.store');

    // Behaviorals 
    Route::resource('behaviorals', BehavioralController::class);

    // Qualifiers 
    Route::resource('qualifiers', QualifierController::class);

    //Answers 
    Route::get('reviews/{reviewId}/answers/create', [AnswerController::class, 'create'])->name('answers.create');
    Route::post('reviews/{reviewId}/answers', [AnswerController::class, 'store'])->name('answers.store');
    Route::get('reviews/{reviewId}/answers/{answerId}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
    Route::put('reviews/{reviewId}/answers/{answerId}', [AnswerController::class, 'update'])->name('answers.update');
    Route::delete('reviews/{reviewId}/answers/{answerId}', [AnswerController::class, 'destroy'])->name('answers.destroy');

    //Subjective Qualifiers
    Route::resource('general_qualifiers', GeneralQualifierController::class);
    // Route::delete('general_qualifiers/guide/{id}', [GeneralQualifierController::class, 'destroy'])->name('general_qualifiers.destroy');
    // Route::get('general_qualifiers/{id}/edit', [GeneralQualifierController::class, 'edit'])->name('general_qualifiers.edit');
    // Route::put('general_qualifiers/{id}', [GeneralQualifierController::class, 'update'])->name('general_qualifiers.update');
    Route::get('/qualifiers/{guide}', [GeneralQualifierController::class, 'index']);
    Route::post('/qualifiers/{qualifier}', [GeneralQualifierController::class, 'update']);


    // Departments
    Route::resource('departments', DepartmentController::class);



    // Show all Job Roles for a department (Index)
    Route::get('/departments/{department}/job-roles', [DepartmentController::class, 'showJobRoles'])->name('departments.job-roles.index');



    // Job Roles Management Routes
    Route::resource('departments.job-roles', JobRoleController::class);
    Route::get('/departments/{department}/job-roles/create', [JobRoleController::class, 'create'])->name('departments.job-roles.create');
    Route::post('/departments/{department}/job-roles', [JobRoleController::class, 'store'])->name('departments.job-roles.store');
    Route::get('/job-roles/assign', [JobRoleController::class, 'assign'])->name('job-roles.assign');
    Route::post('/job-roles/assign', [JobRoleController::class, 'storeAssign'])->name('job-roles.store.assign');
    Route::post('/job-roles/{jobRoleId}/assign-user', [JobRoleController::class, 'assignUserToJobRole'])->name('job-roles.assign-user');
    Route::post('/job-roles/{jobRoleId}/remove-user', [JobRoleController::class, 'removeUserFromJobRole'])->name('job-roles.remove-user');
    Route::resource('job-roles', JobRoleController::class);
    Route::post('/departments/{department}/job-roles', [JobRoleController::class, 'store'])->name('departments.job-roles.store');
    // Route::get('/departments/{departmentId}/job-roles/{jobRoleId}', [JobRoleController::class, 'show'])->name('departments.job-roles.show');
});

