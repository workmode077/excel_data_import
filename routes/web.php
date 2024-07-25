<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\DashboardController;




Route::get('/', [DashboardController::class, 'dashBoard'])->name('dashboard');
