<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\BachelorController;
use App\Http\Controllers\DepositeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MemberController;

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

// Route::resource('/meal', MealController::class);
Route::get('/meal/index', [MealController::class, 'index'])->name('meal.meals_datatable');
Route::post('/meal/store', [MealController::class, 'store'])->name('meal.add.store');

Route::get('/deposite/index', [DepositeController::class, 'index'])->name('deposite.datatable');
Route::post('/deposite/store', [DepositeController::class, 'store'])->name('deposite.store');

Route::get('/meals/details', [MealController::class, 'detailsIndex'])->name('meal.details.index');

Route::post('/market/market', [MarketController::class, 'store'])->name('meal.market.store');
Route::get('/market/market/datatable', [MarketController::class, 'index'])->name('market.datatable');

Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name('meal.edit');
Route::delete('/member/destroy/{id}', [MemberController::class, 'destroy'])->name('meal.destroy');
Route::post('/member/update/{id}', [MemberController::class, 'update'])->name('member.update');


