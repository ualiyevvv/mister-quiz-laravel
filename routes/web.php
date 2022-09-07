<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LeaderboardController;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
// Route::get('/books/{id}', [BookController::class, 'show'])->name('bookshow');


Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register/store', [AuthController::class, 'store'])->name('register.store');
    
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login/store', [AuthController::class, 'login'])->name('login.store');
});

Route::group(['middleware' => 'auth'], function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');
    Route::get('/quiz', [QuizController::class, 'start_quiz'])->name('startquiz');
    // Route::post('/result', [QuizController::class, 'end_quiz'])->name('endquiz');
    Route::match(['GET', 'POST'], '/result', [QuizController::class, 'end_quiz'])->name('endquiz');
    // Route::post('/result', [MainController::class, 'end_quiz'])->name('endquiz');
});


