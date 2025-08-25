<?php

use Illuminate\Support\Facades\Route;
use Lareon\Modules\Department\App\Http\Controllers\Web\Admin\Departments\DepartmentsController;
use Lareon\Modules\Department\App\Http\Controllers\Web\Admin\Teams\TeamsController;

Route::resource('departments', DepartmentsController::class);
Route::resource('departments.teams', TeamsController::class)->scoped();

