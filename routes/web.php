<?php


use App\Service\MealServiceInterface;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BachelorController;
use App\Http\Controllers\DepositeController;
use App\Http\Controllers\Auth\AuthController;



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

Route::get('/register', [AuthController::class, 'index']);
Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');
Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
Route::post('/login/index', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/bachelor', [BachelorController::class, 'index']);

// Route::resource('/meal', MealController::class);
Route::get('/meal/index', [MealController::class, 'index'])->name('meal.meals_datatable');
Route::post('/meal/store', [MealController::class, 'store'])->name('meal.add.store');
Route::get('/meal/edit/{id}', [MealController::class, 'edit'])->name('meal.edit');
Route::post('/meal/update/{id}', [MealController::class, 'update'])->name('meal.update');

Route::get('/deposite/index', [DepositeController::class, 'index'])->name('deposite.datatable');
Route::post('/deposite/store', [DepositeController::class, 'store'])->name('deposite.store');
Route::get('/deposite/edit/{id}', [DepositeController::class, 'edit'])->name('deposite.edit');
Route::post('/deposite/update/{id}', [DepositeController::class, 'update'])->name('deposite.update');

Route::get('/meals/details', [MealController::class, 'detailsIndex'])->name('meal.details.index');

Route::get('/market/datatable', [MarketController::class, 'index'])->name('market.datatable');
Route::post('/market/market', [MarketController::class, 'store'])->name('meal.market.store');
Route::get('/market/eidt/{id}', [MarketController::class, 'edit'])->name('market.edit');
Route::post('/market/update/{id}', [MarketController::class, 'update'])->name('market.update');

Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
Route::delete('/member/destroy/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
Route::post('/member/update/{id}', [MemberController::class, 'update'])->name('member.update');

Route::get('/recycle', [MemberController::class, 'recycle'])->name('recycle');
Route::get('/recycle/restore/{id}', [MemberController::class, 'restore'])->name('recycle.restore');
Route::delete('/recycle/delete/{id}', [MemberController::class, 'force_delete'])->name('recycle.delete');


Route::get('test', function(MealServiceInterface $mealService) {
    ['report' => $abc] =  $mealService->getReportByDateRange('2022-10-01', '2022-11-10');

    return $abc;
});
