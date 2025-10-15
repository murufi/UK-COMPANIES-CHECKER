<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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
    return view('companies.search');
});


Route::get('/companies/search', [CompanyController::class, 'search']);
Route::get('/companies/{number}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/{number}/filing-history', [CompanyController::class, 'show']);
Route::get('/companies/{number}/officers', [CompanyController::class, 'show']);
Route::get('/search', [CompanyController::class, 'showAll']);




// General company search
Route::get('/companies/search', [CompanyController::class, 'search'])->name('companies.search');

// Company profile
Route::get('/companies/{number}/profile', [CompanyController::class, 'profile'])->name('companies.profile');

// Officers (directors)
Route::get('/companies/{number}/officers', [CompanyController::class, 'officers'])->name('companies.officers');

// Filing history
Route::get('/companies/{number}/filings', [CompanyController::class, 'filings'])->name('companies.filings');

// Document metadata and download
Route::get('/documents/{id}/metadata', [CompanyController::class, 'documentMeta'])->name('documents.meta');
Route::get('/documents/{id}/download', [CompanyController::class, 'documentDownload'])->name('documents.download');

// Optional: Search officers globally
Route::get('/officers/search', [CompanyController::class, 'searchOfficers'])->name('officers.search');

// Suggest input (AJAX)
Route::get('/companies/suggest', [CompanyController::class, 'suggest'])->name('companies.suggest');

// Chart data API
Route::get('/companies/chart-data', [CompanyController::class, 'chartData'])->name('companies.chartData');

Route::get('/job', [CompanyController::class, 'work']);


