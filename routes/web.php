<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\BachelorController;

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
Route::get('/bachelor', [BachelorController::class, 'index']);

Route::resource('/meal', MealController::class);
Route::post('/meal/add', [MealController::class, 'mealStore'])->name('meal.add');
Route::get('/meals/datatable', [MealController::class, 'mealsDatatable'])->name('meal.meals_datatable');
Route::post('/meals/market', [MealController::class, 'marketStore'])->name('meal.market');
Route::get('/meals/market/datatable', [MealController::class, 'marketIndex'])->name('market.datatable');
