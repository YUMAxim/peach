<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitController;
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
Route::resource('recruits', RecruitController::class)->except(['index']);

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
