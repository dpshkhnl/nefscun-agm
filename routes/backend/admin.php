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

    
   
    Route::get('approve-form/{id}', [ReportController::class, 'approve'])
    ->name('approve-form')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('approved'), route('admin.approve-form'));
    });

    Route::post('check_form', [ReportController::class, 'check_form'])
    ->name('check_form')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('check_form'), route('admin.check_form'));
    });


    Route::post('reject_form', [ReportController::class, 'reject_form'])
    ->name('reject_form')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('reject_form'), route('admin.reject_form'));
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