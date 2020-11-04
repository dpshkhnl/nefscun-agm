<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });
    
    Route::post('/showDetails', [RegisterController::class, 'showDetails'])->name('showDetails');
    Route::post('/getDistrict',  [HomeController::class, 'getDistrict'])->name('getDistrict');
    Route::post('/getLocal', [HomeController::class, 'getLocal'])->name('getLocal');
    Route::post('/saveBasic', [RegisterController::class, 'saveBasic'])->name('saveBasic');
    Route::post('/saveRepresentative', [RegisterController::class, 'saveRepresentative'])->name('saveRepresentative');
    Route::post('/saveUploadDoc', [RegisterController::class, 'saveUploadDoc'])->name('saveUploadDoc');
    Route::post('/saveComment', [RegisterController::class, 'saveComment'])->name('saveComment');
    Route::get('/autocomplete/{query}', [RegisterController::class, 'autocomplete'])->name('autocomplete');
