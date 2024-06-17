<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [QuotesController::class, 'index'])->name('quotes');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('quotes');
    })->name('logout');
    Route::get('/newQuote', [QuotesController::class, "showEditor"])->name("newquote");
    Route::post('/addQuote', [QuotesController::class, "createQuote"])->name("addQuote");
    Route::get('/QuotesList', [QuotesController::class, 'getUserQuotes'])->name('QuotesList');
});



Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'SignUpForm'])->name('register');


//post routes
Route::post('/login', [AuthController::class, 'ValidateLogin']);
Route::post('/register', [AuthController::class, 'ValidateSignUp']);
