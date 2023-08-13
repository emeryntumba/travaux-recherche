<?php

use App\Http\Controllers\ArchivageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::post('/result', [IndexController::class, 'search'])->name('search');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login-post', [UserController::class, 'authenticate'])->name("login-post");
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register-post', [UserController::class, 'registerSave'])->name('register-post');
    Route::get('signout', [UserController::class, 'signout'])->name('signout');
  });

  Route::group(['prefix' => 'archiver'], function(){
    Route::get('/', [IndexController::class, 'archiver'])->name('archiver')->middleware('auth');
    Route::post('/store', [ArchivageController::class, 'store'])->name('save-archive')->middleware('auth');
  });

  Route::get('/generate-pdf', [PdfController::class, 'generatePDF'])->name('generate-pdf');

  Route::get('/telecharger/{file}', [ArchivageController::class, 'telecharger'])->name('telecharger');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
