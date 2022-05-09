<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Models\User;

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

Route::get('/', [RecruitController::class, 'index'])->name('recruits.index');
Route::post('comfirm', [RecruitController::class, 'confirm'])->name('recruits.confirm');
Route::post('send', [RecruitController::class, 'send'])->name('recruits.send');
Route::resource('recruits', RecruitController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('recruits', RecruitController::class)->only(['show']);

Route::prefix('recruits/{recruit}')->group(function () {
    Route::resource('offers', OfferController::class);
});


Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
});

// Route::get('dashboard', function () {
//     return view('index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
