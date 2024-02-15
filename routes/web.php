<?php

use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Route;
use SuperFaktura\ApiClient\ApiClient;
use SuperFaktura\ApiClient\Authorization\SimpleProvider;
use SuperFaktura\ApiClient\MarketUri;

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

Route::match(['get', 'post'], '/', [CompaniesController::class, 'show'])->name('companies');
