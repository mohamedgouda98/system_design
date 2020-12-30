<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class,'homeData'])->name('home');

Route::get('/dashboard', [AdminController::class,'dashboard']);
Route::get('/login', [AdminController::class,'login'])->name('login');
Route::post('/form/login', [AdminController::class,'loginForm'])->name('form.login');

Route::get('/dashboard/index', [AdminController::class,'index'])->name('dashboard.index');

Route::post('/item/add', [AdminController::class,'addItem'])->name('add_item');

Route::get('/items', [AdminController::class,'allItems'])->name('dashboard.items');

Route::delete('/item/delete/{id}', [AdminController::class,'deleteItem'])->name('item.delete');

Route::get('/requests', [AdminController::class,'allRequests'])->name('dashboard.requests');


// User

Route::post('search', [UserController::class,'search'])->name('search');

Route::get('/request/{id}', [UserController::class, 'request'])->name('request');

Route::post('/request/add', [UserController::class, 'addRequest'])->name('add.request');
