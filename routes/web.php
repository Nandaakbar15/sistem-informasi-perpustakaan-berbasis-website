<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\DataUsersController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::post('/login', [LoginController::class, 'handleLogin']);


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');

    Route::get('/admin/data-users', [DataUsersController::class, 'index_users']);

    Route::get('/admin/data-buku', [DataBukuController::class, 'index']);

    Route::get('/admin/view-tambah-buku', [DataBukuController::class, 'create']);

    Route::post('/admin/tambah-buku', [DataBukuController::class, 'store']);

    Route::get('/admin/detailbuku/{buku}', [DataBukuController::class, 'show']);

    Route::get('/admin/view-edit-buku/{buku}', [DataBukuController::class, 'edit']);

    Route::delete('/admin/delete-buku/{buku}', [DataBukuController::class, 'destroy']);

});
