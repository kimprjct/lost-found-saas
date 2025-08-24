<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\FoundRequestController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ClaimHistoryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TenantRegistrationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Home route -> public welcome page or appropriate dashboard if already authenticated
Route::get('/', function () {
	if (Auth::check()) {
		$user = Auth::user();
		if ($user->role === 'super_admin') {
			return redirect()->route('admin.dashboard');
		}
		return redirect()->route('tenant.dashboard');
	}
	return view('welcome');
});

// Tenant Registration (Public)
Route::post('/tenant/register', [TenantRegistrationController::class, 'store'])->name('tenant.register');

// Super Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:super_admin'])->group(function () {
	Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
	Route::resource('tenants', TenantController::class);
	Route::resource('users', UserController::class);
	Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
	
	// Tenant Registration Requests
	Route::get('/registration-requests', [TenantRegistrationController::class, 'index'])->name('admin.registration-requests');
	Route::post('/registration-requests/{id}/approve', [TenantRegistrationController::class, 'approve'])->name('admin.registration-requests.approve');
	Route::post('/registration-requests/{id}/reject', [TenantRegistrationController::class, 'reject'])->name('admin.registration-requests.reject');
});

// Tenant Routes
Route::prefix('tenant')->as('tenant.')->middleware(['auth', 'role:tenant_admin,staff'])->group(function () {
	Route::get('/dashboard', [TenantController::class, 'dashboard'])->name('dashboard');
	Route::resource('lost-items', LostItemController::class);
	Route::resource('found-items', FoundItemController::class);
	Route::resource('claims', ClaimController::class);
	Route::resource('found-requests', FoundRequestController::class);
	Route::resource('user-management', UserManagementController::class);
	Route::resource('claim-history', ClaimHistoryController::class);
	Route::resource('staff', StaffController::class);
	
	// Tenant Setup Routes
	Route::get('/setup', [App\Http\Controllers\TenantSetupController::class, 'show'])->name('setup.show');
	Route::post('/setup', [App\Http\Controllers\TenantSetupController::class, 'update'])->name('setup.update');
});

// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

require __DIR__.'/auth.php';
