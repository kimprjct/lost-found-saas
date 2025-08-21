<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ClaimController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/tenants', function () {
        return Tenant::select('id', 'name', 'domain', 'logo')->orderBy('name')->get();
    });

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/reports', [ReportController::class, 'store']);
    Route::get('/reports/{tenant}', [ReportController::class, 'index']);
    Route::post('/claim', [ClaimController::class, 'store']);
});