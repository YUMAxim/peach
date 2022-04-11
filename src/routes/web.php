<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollaboratorRequestController;
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

Route::get('/', [CollaboratorRequestController::class, 'index'])->name('requests.index');
Route::post('comfirm', [CollaboratorRequestController::class, 'confirm'])->name('requests.confirm');
Route::post('send', [CollaboratorRequestController::class, 'send'])->name('requests.send');
Route::resource('requests', CollaboratorRequestController::class)->except(['index']);

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
