<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ChangePasswordController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Halaman home
Route::get('/', [PostController::class, ('index')])->name('login');
Route::get('/detail/{post:slug}', [PostController::class, ('detail')]);

// Post
Route::get('/create', [PostController::class, ('create')])->middleware('auth');
Route::post('/store', [PostController::class, ('store')]);
Route::get('/delete/post/{id}', [PostController::class, ('destroy')]);
Route::get('/dashboard/edit/{id}', [PostController::class, ('show')]);
Route::post('/update/{id}', [PostController::class, ('update')]);

// Halaman user Login & Register
Route::get('/login', [LoginController::class, ('index')]);
Route::post('/login', [LoginController::class, ('authenticate')]);
Route::post('/logout', [LoginController::class, ('logout')]);

// ---------------------------------------------------------------------
Route::get('/register', [RegisterController::class, ('index')]);
Route::post('/add', [RegisterController::class, ('store')]);

// Halaman dahsboard Admin
Route::get('/dashboard', [PostController::class, ('admin')]);

// Category
Route::get('/category', [CategoryController::class, ('index')])->middleware('admin');
Route::post('/storeCategory', [CategoryController::class, ('tambah')]);
Route::get('/delete/{id}', [CategoryController::class, ('destroy')]);

// Tambah user
Route::get('/add', [AddUserController::class, ('index')])->middleware('admin');
Route::post('/storeUser', [AddUserController::class, ('store')]);
Route::get('/delete/user/{id}', [AddUserController::class, ('destroy')]);

// Edit User
Route::get('/setting/{id}', [SettingController::class, ('show')])->middleware('auth');
Route::post('/updateUser/{id}', [SettingController::class, ('update')]);
Route::get('/setting/changepass/{user:id}', [ChangePasswordController::class, ('index')]);