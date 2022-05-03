<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;


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
//Route::resource('UserController', UserController::class);
//Route::get('/', function () {  return view('welcome');});
//Route::view('/register', 'user/register');


Route::get('/', [UserController::class, 'index']);
Route::get('index', [UserController::class, 'index']);

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/add', [UserController::class, 'add'])->name('add');
Route::post('/add', [UserController::class, 'addSubmit']);
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('/edit', [UserController::class, 'editSubmit']);
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');

Route::match(["get", "post"], "read-xml", [UserController::class, "xmlUpload"])->name('xml-upload');
















//Route::get('/secureLogin', [AdminController::class, 'login'])->name('admin.secureLogin');
//Route::post('/secureLoginSubmit', [AdminController::class, 'loginSubmit'])->name('admin.secureLoginSubmit');


