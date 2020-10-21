<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ReportController;

use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::get('register', [ReportController::class, 'index'])
    ->name('register')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Registered'), route('admin.register'));
    });
    Route::get('approved', [ReportController::class, 'approved'])
    ->name('approved')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('approved'), route('admin.approved'));
    });

    Route::get('rejected', [ReportController::class, 'rejected'])
    ->name('rejected')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('rejected'), route('admin.rejected'));
    });