<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestMessageController;
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

Route::get('/', function () {return View('welcome');});

Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth')->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth')->name('jobs.store');

Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::delete('/jobs/{job}', [JobController::class, 'delete'])->middleware('auth')->name('jobs.delete');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->name('jobs.edit');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')->name('jobs.update');

Route::post('/jobs/{job}/request', [RequestController::class, 'store'])->middleware('auth')->name('request.store');
Route::get('/request/{jobRequest}', [RequestController::class, 'show'])->name('request.show');
Route::delete('/request/{jobRequest}', [RequestController::class, 'delete'])->middleware('auth')->name('request.delete');

Route::post('/request/{jobRequest}/message', [RequestMessageController::class, 'store'])->middleware('auth')->name('requestMessage.store');
Route::get('/message/{requestMessage}/edit', [RequestMessageController::class, 'edit'])->middleware('auth')->name('requestMessage.edit');
Route::patch('/message/{requestMessage}', [RequestMessageController::class, 'update'])->middleware('auth')->name('requestMessage.update');
Route::delete('/message/{requestMessage}', [RequestMessageController::class, 'delete'])->middleware('auth')->name('requestMessage.delete');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
