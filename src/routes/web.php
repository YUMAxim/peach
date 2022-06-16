<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\MessageController;
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

Route::get('/recruits', [RecruitController::class, 'index'])->name('recruits.index');
Route::resource('/recruits', RecruitController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/recruits', RecruitController::class)->only(['show']);

Route::prefix('recruits/{recruit}')->group(function () {
    Route::resource('/contract', ContractController::class);
    Route::get('/download', [DownloadController::class, 'index'])->name('download');
    Route::resource('/offers', OfferController::class);
    Route::get('/offers', [OfferController::class, 'sendMessageAfterStored'])->name('offers.send');
});

Route::get('/message', [MessageController::class, 'list'])->name('messages.list');
Route::prefix('user/{id}')->group(function () {
    Route::resource('/message', MessageController::class);
});

Route::prefix('user')->name('users.')->group(function () {
    Route::get('/{id}', [UserController::class, 'show'])->name('show');

    // Route::get('/{id}', [UserController::class, 'show'])->group(function () {
    //     Route::resource('/messages', MessageController::class);
    // })->name('show');
});


// Route::get('dashboard', function () {
//     return view('index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
