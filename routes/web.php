<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application. These    |
| routes are loaded by the RouteServiceProvider within a group which       |
| contains the "web" middleware group. Now create something great!          |
|--------------------------------------------------------------------------|
*/
use Illuminate\Support\Facades\Auth;

Auth::routes(); // This registers the login, logout, and registration routes


// Homepage route (Welcome page)
Route::get('/', function () {
    return view('welcome');
});

// Route to show the form for creating a new survey
Route::get('/surveys/create', [SurveyController::class, 'create'])->name('surveys.create');

// Route to handle the form submission and store the new survey
Route::post('/surveys', [SurveyController::class, 'store'])->name('surveys.store');

// Route to display all surveys (this was missing in your original code)
Route::get('/surveys', [SurveyController::class, 'index'])->name('surveys.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('surveys', SurveyController::class);



Route::resource('surveys', SurveyController::class);
