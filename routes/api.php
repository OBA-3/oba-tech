<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Api\Admin\TechnologyController;
use App\Http\Controllers\Api\Admin\TeamMemberController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\ProjectTechnologyController;
use App\Http\Controllers\ProjectTeamMemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Authenticated User
|--------------------------------------------------------------------------
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/*
|--------------------------------------------------------------------------
| Public Projects
|--------------------------------------------------------------------------
*/

// All projects
Route::get(
    '/projects',
    [ProjectController::class, 'index']
);

// Featured projects
Route::get(
    '/projects/featured',
    [ProjectController::class, 'featured']
);

// Single project by slug
Route::get(
    '/projects/{slug}',
    [ProjectController::class, 'show']
);


/*
|--------------------------------------------------------------------------
| Public Project Images
|--------------------------------------------------------------------------
*/

// Get project images
Route::get(
    '/projects/{project}/images',
    [ProjectImageController::class, 'index']
);


/*
|--------------------------------------------------------------------------
| Public Project Technologies
|--------------------------------------------------------------------------
*/

// Get all technologies of a project
Route::get(
    '/projects/{project}/technologies',
    [ProjectTechnologyController::class, 'index']
);


/*
|--------------------------------------------------------------------------
| Public Project Team Members
|--------------------------------------------------------------------------
*/

// Get all team members of a project
Route::get(
    '/projects/{project}/team-members',
    [ProjectTeamMemberController::class, 'index']
);


/*
|--------------------------------------------------------------------------
| Admin Authentication - Public
|--------------------------------------------------------------------------
*/

// Admin login
Route::post(
    '/admin/login',
    [AuthController::class, 'login']
);


/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware('auth:sanctum')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Authentication
        |--------------------------------------------------------------------------
        */

        // Current authenticated admin
        Route::get(
            '/me',
            [AuthController::class, 'me']
        );

        // Logout
        Route::post(
            '/logout',
            [AuthController::class, 'logout']
        );


        /*
        |--------------------------------------------------------------------------
        | Admin Projects
        |--------------------------------------------------------------------------
        */

        // Get all projects
        Route::get(
            '/projects',
            [AdminProjectController::class, 'index']
        );

        // Get single project
        Route::get(
            '/projects/{project}',
            [AdminProjectController::class, 'show']
        );

        // Create project
        Route::post(
            '/projects',
            [AdminProjectController::class, 'store']
        );

        // Update project
        Route::patch(
            '/projects/{project}',
            [AdminProjectController::class, 'update']
        );

        // Delete project
        Route::delete(
            '/projects/{project}',
            [AdminProjectController::class, 'destroy']
        );


        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/categories',
            [CategoryController::class, 'index']
        );

        Route::post(
            '/categories',
            [CategoryController::class, 'store']
        );

        Route::patch(
            '/categories/{category}',
            [CategoryController::class, 'update']
        );

        Route::delete(
            '/categories/{category}',
            [CategoryController::class, 'destroy']
        );


        /*
        |--------------------------------------------------------------------------
        | Technologies
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/technologies',
            [TechnologyController::class, 'index']
        );

        Route::post(
            '/technologies',
            [TechnologyController::class, 'store']
        );

        Route::patch(
            '/technologies/{technology}',
            [TechnologyController::class, 'update']
        );

        Route::delete(
            '/technologies/{technology}',
            [TechnologyController::class, 'destroy']
        );


        /*
        |--------------------------------------------------------------------------
        | Team Members
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/team-members',
            [TeamMemberController::class, 'index']
        );

        Route::post(
            '/team-members',
            [TeamMemberController::class, 'store']
        );

        Route::get(
            '/team-members/{teamMember}',
            [TeamMemberController::class, 'show']
        );

        Route::patch(
            '/team-members/{teamMember}',
            [TeamMemberController::class, 'update']
        );

        Route::delete(
            '/team-members/{teamMember}',
            [TeamMemberController::class, 'destroy']
        );


        /*
        |--------------------------------------------------------------------------
        | Project Images
        |--------------------------------------------------------------------------
        */

        // Upload project image
        Route::post(
            '/projects/{project}/images',
            [ProjectImageController::class, 'store']
        );

        // Update project image
        Route::patch(
            '/project-images/{image}',
            [ProjectImageController::class, 'update']
        );

        // Delete project image
        Route::delete(
            '/project-images/{image}',
            [ProjectImageController::class, 'destroy']
        );


        /*
        |--------------------------------------------------------------------------
        | Project Technologies
        |--------------------------------------------------------------------------
        */

        // Attach technology
        Route::post(
            '/projects/{project}/technologies',
            [ProjectTechnologyController::class, 'store']
        );

        // Synchronize technologies
        Route::put(
            '/projects/{project}/technologies',
            [ProjectTechnologyController::class, 'sync']
        );

        // Detach technology
        Route::delete(
            '/projects/{project}/technologies/{technology}',
            [ProjectTechnologyController::class, 'destroy']
        );


        /*
        |--------------------------------------------------------------------------
        | Project Team Members
        |--------------------------------------------------------------------------
        */

        // Attach team member
        Route::post(
            '/projects/{project}/team-members',
            [ProjectTeamMemberController::class, 'store']
        );

        // Update member role
        Route::patch(
            '/projects/{project}/team-members/{teamMember}',
            [ProjectTeamMemberController::class, 'update']
        );

        // Synchronize team members
        Route::put(
            '/projects/{project}/team-members',
            [ProjectTeamMemberController::class, 'sync']
        );

        // Detach team member
        Route::delete(
            '/projects/{project}/team-members/{teamMember}',
            [ProjectTeamMemberController::class, 'destroy']
        );

    });