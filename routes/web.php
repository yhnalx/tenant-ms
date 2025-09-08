<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TenantApplicationController;
use App\Http\Controllers\AdminTenantApprovalController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\RequestMaintenanceController;
use App\Http\Controllers\Tenant\LeaseController;
use App\Http\Controllers\Tenant\PaytenantController;
use App\Http\Controllers\Tenant\MaintenanceController;
use App\Http\Controllers\ReportController;


// --- HOME REDIRECT ---
Route::get('/', fn() => redirect()->route('getstarted'));

// --- GET STARTED PAGE ---
Route::get('/getstarted', fn() => view('getstarted'))->name('getstarted');

// --- AUTH ROUTES ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Manager Dashboard
Route::get('/Dashboard', fn() => view('Dashboard'))->name('Dashboard');
// Tenant Dashboard
Route::get('/Tenantdash', fn() => view('Tenantdash'))->name('Tenantdash');

// --- GENERAL REGISTRATION ---
Route::get('/register', [RegisterController::class, 'index'])->name('Registertenant');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// --- TENANT APPLICATION FORM ---
Route::get('/tenantapply', [TenantApplicationController::class, 'dashboard'])->name('tenantapply');
Route::post('/tenantapply', [TenantApplicationController::class, 'submitApplication'])->name('tenantapply.submit');

// Tenant dashboard
Route::get('/tenant/dashboard', [AdminTenantApprovalController::class, 'dashboard'])->name('tenant.dashboard');

// --- REGISTER TENANT FORM ---
Route::get('/tenantregister', [TenantApplicationController::class, 'index'])->name('tenantregister');
Route::post('/tenantregister', [TenantApplicationController::class, 'submitApplication'])->name('tenantregister.submit');


// --- AUTHENTICATED DASHBOARD ROUTES ---
Route::middleware(['auth'])->group(function () {
    // Admin/Manager Dashboard
    Route::get('/dashboard', fn() => view('Dashboard'))->name('dashboard');
    Route::get('/tenantman', fn() => view('tenantman'))->name('tenantman');
    Route::get('/leaseman', [AdminTenantApprovalController::class, 'showleaseman'])->name('leaseman');
    Route::get('/deposit', fn() => view('deposit'))->name('deposit');
    Route::get('/rentpay', fn() => view('rentpay'))->name('rentpay');
    Route::get('/mainte', [RequestMaintenanceController::class, 'index'])->name('mainte');

    // ✅ Reports
    // ✅ Reports
// Reports
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::get('/reports/tenants', [ReportController::class, 'tenantList'])->name('reports.tenants');
Route::get('/reports/leases', [ReportController::class, 'leaseReport'])->name('reports.leases');
Route::get('/reports/payments', [ReportController::class, 'paymentReport'])->name('reports.payments');
Route::get('/reports/deposits', [ReportController::class, 'depositReport'])->name('reports.deposits');
Route::get('/reports/maintenance', [ReportController::class, 'maintenanceReport'])->name('reports.maintenance');
Route::get('/reports/occupancy', [ReportController::class, 'occupancyReport'])->name('reports.occupancy');
Route::get('/reports/financial', [ReportController::class, 'financialReport'])->name('reports.financial');
Route::get('/reports/expiring', [ReportController::class, 'expiringLeases'])->name('reports.expiring');
Route::get('/reports/delinquent', [ReportController::class, 'delinquentPayments'])->name('reports.delinquent');

Route::get('/reports/export/{type}', [ReportController::class, 'export'])->name('reports.export');



    // Settings
    Route::get('/setting', fn() => view('setting'))->name('setting');
    Route::get('/settingpayment', fn() => view('settingpayment'))->name('settingpayment');
    Route::get('/settingdocu', fn() => view('settingdocu'))->name('settingdocu');
    Route::get('/settingprefen', fn() => view('settingprefen'))->name('settingprefen');
    Route::get('/settingteam', fn() => view('settingteam'))->name('settingteam');
    Route::get('/settingauth', fn() => view('settingauth'))->name('settingauth');
    Route::get('/settingback', fn() => view('settingback'))->name('settingback');
    Route::get('/settinguser', fn() => view('settinguser'))->name('settinguser');

    // Tenant Dashboard
    Route::get('/propertylisting', fn() => view('propertylisting'))->name('propertylisting');
    Route::get('/maintenant', fn() => view('maintenant'))->name('maintenant');
    Route::get('/deposittenant', fn() => view('deposittenant'))->name('deposittenant');
    Route::get('/tenantsetting', fn() => view('tenantsetting'))->name('tenantsetting');
    Route::get('/tenantacc', fn() => view('tenantacc'))->name('tenantacc');
    Route::get('/tenantpay', fn() => view('tenantpay'))->name('tenantpay');
    Route::get('/tenantdocu', fn() => view('tenantdocu'))->name('tenantdocu');
    Route::get('/tenanthis', fn() => view('tenanthis'))->name('tenanthis');
});

// Manager profile
Route::get('/profilemanager', fn() => view('managerprofile'))->middleware('auth')->name('managerprofile');

// Lease Management
Route::get('/leaseman', [AdminTenantApprovalController::class, 'index'])->name('leaseman');
Route::get('/tenantman', [AdminTenantApprovalController::class, 'tenantman'])->name('tenantman');
Route::get('/tenantman/{id}', [AdminTenantApprovalController::class, 'showTenant'])->name('tenantman.show');
Route::get('/tenantman/{id}/edit', [AdminTenantApprovalController::class, 'editTenant'])->name('tenantman.edit');
Route::put('/tenantman/{id}', [AdminTenantApprovalController::class, 'updateTenant'])->name('tenantman.update');
Route::delete('/tenantman/{id}', [AdminTenantApprovalController::class, 'destroyTenant'])->name('tenantman.destroy');

// Approvals
Route::post('/leaseman/approve/{id}', [AdminTenantApprovalController::class, 'approve'])->name('leaseman.approve');
Route::post('/leaseman/reject/{id}', [AdminTenantApprovalController::class, 'reject'])->name('leaseman.reject');
// Lease approval creating a lease record in tbl_lease
Route::post('/leaseman/approve-tenant/{user}', [LeaseController::class, 'approveTenant'])
    ->middleware('auth') // make sure only logged-in manager/admin can access
    ->name('leaseman.approveTenant');

Route::delete('/leaseman/application/{id}', [AdminTenantApprovalController::class, 'destroyApplication'])->name('leaseman.destroyApplication');
Route::get('/leaseman/{id}/edit', [AdminTenantApprovalController::class, 'leaseedit'])->name('leaseman.edit');
Route::put('/leaseman/{id}', [AdminTenantApprovalController::class, 'update'])->name('leaseman.update');

// Lease Agreement
Route::get('/lease-agreement', [TenantController::class, 'leaseAgreement'])->name('lease_agreement');
Route::post('/lease_agreement/upload', [TenantController::class, 'uploadLease'])->name('lease.upload');
Route::get('/Tenantdash', [TenantController::class, 'dashboard'])->name('Tenantdash');

// Tenant Lease & Payment
Route::get('/leasetenant', [LeaseController::class, 'index'])->middleware('auth')->name('leasetenant');
Route::get('/paytenant', [PaytenantController::class, 'showPayments'])->name('paytenant');

// Tenant Maintenance
Route::middleware(['auth'])->prefix('tenant')->name('tenant.')->group(function () {
    Route::post('/maintenance/{id}/update', [MaintenanceController::class, 'update'])->name('maintenance.update');
});

// Manager Maintenance
Route::middleware(['auth'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/maintenance', [RequestMaintenanceController::class, 'index'])->name('maintenance.index');
    Route::post('/maintenance/{id}/update', [RequestMaintenanceController::class, 'updateStatus'])->name('maintenance.update');
});
