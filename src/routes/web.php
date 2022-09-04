<?php

use Illuminate\Support\Facades\Route;
use Jmrashed\Automation\App\Http\Controllers\AutomationController;

Route::prefix('automations')->group(function () {
    Route::get('/', [AutomationController::class, 'index'])->name('automations.index');
    Route::get('/dashboard', [AutomationController::class, 'dashboard'])->name('automations.dashboard');
    Route::get('/env', [AutomationController::class, 'env'])->name('automations.env');
    Route::get('/models', [AutomationController::class, 'models'])->name('automations.models');
    Route::get('/migrations', [AutomationController::class, 'migrations'])->name('automations.migrations');
});
