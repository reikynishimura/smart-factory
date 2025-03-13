<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\WorkingSequenceController;
use App\Http\Controllers\HomeController;


Route::view('/register', 'pages.auth.register')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


Route::view('/login', 'pages.auth.login')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);


Route::view('/forgotpw', 'pages.auth.forgotpw')->name('forgotpw');


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/create', [ProjectController::class, 'create']);
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit']);
Route::post('/projects/masterp', [ProjectController::class, 'masterp']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'delete']);


Route::get('/working_sequences', [WorkingSequenceController::class, 'index'])->name('working_sequences.index');
Route::get('/working_sequences', [WorkingSequenceController::class, 'index']);
Route::post('/working_sequences/masterwi', [WorkingSequenceController::class, 'masterwi']);
Route::put('/working_sequences/{id}', [WorkingSequenceController::class, 'update']);
Route::delete('/working_sequences/{id}', [WorkingSequenceController::class, 'delete']);


Route::get('/working_sequences/export-excel', [WorkingSequenceController::class, 'exportExcel'])->name('working_sequences.exportExcel');
Route::get('/working_sequences/export-pdf', [WorkingSequenceController::class, 'exportPdf'])->name('working_sequences.exportPdf');


Route::get('/projects/export-excel', [ProjectController::class, 'exportExcel'])->name('projects.exportExcel');
Route::get('/projects/export-pdf', [ProjectController::class, 'exportPdf'])->name('projects.exportPdf');