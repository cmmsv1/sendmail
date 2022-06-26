<?php

use App\Http\Controllers\RegisterServiceController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::resource('/student', StudentController::class)->middleware('auth');
Route::resource('/subject', SubjectController::class)->middleware('auth');
Route::resource('/rservice', RegisterServiceController::class);
// Route::get('/notification', [RegisterServiceController::class, 'notification'])->name('rservice.notification');
Route::resource('/score', ScoreController::class)->middleware('auth');
Route::get('/score/add-score/{id}', [ScoreController::class, 'addScore'])->name('score.addScore')->middleware('auth');
