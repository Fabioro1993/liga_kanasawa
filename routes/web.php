<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompetitionController;

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
    return redirect('/competition');
});

Route::prefix('category')->group(function () {
    route::get('/', [CategoryController::class, 'index'])->name('category.index');
    route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    route::get('/edit/{id}', [CategoryController::class, 'edit']);
    route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    route::delete('/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    route::post('/belts', [CategoryController::class, 'belts'])->name('category.belts');
});

Route::prefix('competition')->group(function () {
    route::get('/', [CompetitionController::class, 'index'])->name('competition.index');
    route::post('/store', [CompetitionController::class, 'store'])->name('competition.store');
    route::get('/edit/{id}/{type}', [CompetitionController::class, 'edit']);
    route::post('/update', [CompetitionController::class, 'update'])->name('competition.update');
    route::delete('/destroy', [CompetitionController::class, 'destroy'])->name('competition.destroy');
    route::post('/belts', [CompetitionController::class, 'belts'])->name('competition.belts');
});

Route::prefix('reports')->group(function () {
    route::get('/dojo', [ReportController::class, 'dojo'])->name('reports.dojo');
    route::get('/dojo/dev', [ReportController::class, 'dev'])->name('reports.dojo.dev');
    route::get('/dojo/formation', [ReportController::class, 'formation'])->name('reports.dojo.formation');
    route::get('/organization', [ReportController::class, 'organization'])->name('reports.organization');
});
