<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/welcome', [App\Http\Controllers\AuthController::class, 'welcome'])->middleware('user');

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/regis', [App\Http\Controllers\AuthController::class, 'regis']);
Route::post('/postRegister', [App\Http\Controllers\AuthController::class, 'postRegister']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/postLogin', [App\Http\Controllers\AuthController::class, 'postLogin']);
Route::get('/forgot', [App\Http\Controllers\AuthController::class, 'forgot']);
Route::get('/tasks', [App\Http\Controllers\TugasController::class, 'tasks']);
Route::post('/postTugas', [App\Http\Controllers\TugasController::class, 'postTugas']);
Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile']);
Route::get('/download', [App\Http\Controllers\AuthController::class, 'download']);
Route::get('/newTask', [App\Http\Controllers\TugasController::class, 'newTask']);
//Route::post('/postNewTugas',[App\Http\Controllers\TugasController::class,'postNewTugas']);
Route::post('/postNewMateri', [MateriController::class, 'postNewMateri']);
Route::get('/welcome_lecturer', [App\Http\Controllers\AuthController::class, 'welcome_lecturer']);
Route::get('/profile_lecturer', [App\Http\Controllers\AuthController::class, 'profile_lecturer']);
Route::get('/welcome_admin', [App\Http\Controllers\AuthController::class, 'welcome_admin'])->middleware('admin');
Route::get('/profile_admin', [App\Http\Controllers\AuthController::class, 'profile_admin']);
Route::get('/add_task', [App\Http\Controllers\TugasController::class, 'add_task']);
Route::put('/editTugas', [AdminController::class, 'editTugas']);
Route::delete('/hapusTugas', [AdminController::class, 'hapusTugas']);
Route::get('/add_user', [App\Http\Controllers\AdminController::class, 'add_user']);

// MATERI ROUTES ADMIN
Route::get('/add_materi', [App\Http\Controllers\MateriController::class, 'add_materi'])->middleware('teacher');
Route::post('/store_materi', [App\Http\Controllers\MateriController::class, 'store_materi'])->middleware('admin');
Route::get('/all_materi', [App\Http\Controllers\MateriController::class, 'all_materi'])->middleware('admin');
Route::get('/teacher_materi', [App\Http\Controllers\MateriController::class, 'newMateri']);

// MATERI ROUTES USER
Route::get('/materi', [App\Http\Controllers\MateriController::class, 'materi'])->middleware('user');


// MATERI ROUTES TEACHER
Route::get('/show_materi', [App\Http\Controllers\MateriController::class, 'all_materi'])->middleware('teacher');
