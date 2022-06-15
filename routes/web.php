<?php

use App\Http\Controllers\Report\HierarchyReportController;
use App\Http\Controllers\Report\TransactionsReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'report-1'], function () {
    Route::get('', [HierarchyReportController::class, 'index']);
    Route::post('', [HierarchyReportController::class, 'report']);
});

Route::group(['prefix' => 'report-2'], function () {
    Route::get('', [TransactionsReportController::class, 'index']);
    Route::post('', [TransactionsReportController::class, 'report']);
});
