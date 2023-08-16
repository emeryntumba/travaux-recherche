<?php

use App\Http\Controllers\ArchivageController;
use App\Http\Controllers\Archives\ArchiveController;
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

Route::get('/generate-pdf', [IndexController::class, 'generatePDF'])->middleware('auth')->name('generate-pdf');

Route::get('/storage/{file}', [ArchivageController::class, 'telecharger'])->middleware('auth')->name('telecharger');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'admin/travaux'], function(){

    Route::get('/', [ArchiveController::class, 'index'])->name('travail');

    Route::get('create', [ArchiveController::class, 'create'])->name('travail-create');

    Route::get('{travail}', [ArchiveController::class, 'show'])->name('travail-show');

    Route::get('{travail}/edit', [ArchiveController::class, 'edit'])->name('travail-edit');

    Route::post('store', [ArchiveController::class, 'store'])->name('travail-store');

    Route::put('{travail}', [ArchiveController::class, 'update'])->name('travail-update');

    Route::delete('{travail}', [ArchiveController::class, 'destroy'])->name('travail-delete');

});
