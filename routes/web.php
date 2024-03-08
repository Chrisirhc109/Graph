<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraphController;


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


Route::get('/', [GraphController::class, 'showGraph'])->name('graphs.show');

Route::get('/pie',[GraphController::class, 'piechart'])->name('pieChart.show');

Route::get('/line',[GraphController::class,'linechart'])->name('lineChart.show');

Route::get('/google',[GraphController::class,'barchartGOOGLE'])->name('google-charts.show');
