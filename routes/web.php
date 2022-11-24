<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\RecruitmentRequestController;
use App\Http\Controllers\QuestionController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/upload', [App\Http\Controllers\CandidateController::class, 'upload'])->name('get_upload');
Route::post('/upload', [App\Http\Controllers\HomeController::class, 'upload'])->name('upload');
Route::get('/getLink', [App\Http\Controllers\HomeController::class, 'getLinkData'])->name('getLinkData');

Route::resource('/requirements', RecruitmentRequestController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('/candidates', CandidateController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('/schedules', ScheduleController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('/questions', QuestionController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('/users', UserController::class);
