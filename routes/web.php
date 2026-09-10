<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/projects/{slug}', [ProjectController::class, 'show'])
    ->name('projects.show');

Route::get('/admin', function () {
    return view('admin.dashboard');
});


Route::get('/admin/projects', [ProjectController::class, 'index'])
    ->name('admin.projects.index');