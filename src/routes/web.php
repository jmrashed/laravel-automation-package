<?php

use Illuminate\Support\Facades\Route;
use Jmrashed\Automation\App\Http\Controllers\AutomationController;

Route::get('/automations', [AutomationController::class, 'index'])->name('automations.index'); 