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

Route::get('/', function () {
    return view('welcome');
});



// Route::controller(AuthController::class)->group (function () {
//     Route::get('login','login')->name('login');
// });
// Route::controller(AuthController::class)->group(function () {
//     Route::get('regis', 'regis')->name('regis');
// });
// Route::controller(AuthController::class)->group(function () {
//     Route::get('forgot', 'forgot')->name('forgot');
// });
// Route::controller(AuthController::class)->group(function (){
//     Route::get('tasks', 'tasks,')->name('tasks');
// });
// Route::controller(AuthController::class)->group(function (){
//     Route::get('materi', 'materi,')->name('materi');
// });
// Route::controller(AuthController::class)->group(function (){
//     Route::get('profile', 'profile,')->name('profile');
// });
//Route::post('/postRegistrasi',[\regis, 'postRegistrasi']);

Route::get('/welcome',[App\Http\Controllers\AuthController::class,'welcome']);

Route::get('/logout',[App\Http\Controllers\AuthController::class,'logout']);

Route::get('/regis',[App\Http\Controllers\AuthController::class,'regis']);
Route::post('/postRegister',[App\Http\Controllers\AuthController::class,'postRegister']);

Route::get('/login',[App\Http\Controllers\AuthController::class,'login']);
Route::post('/postLogin',[App\Http\Controllers\AuthController::class,'postLogin']);

Route::get('/forgot',[App\Http\Controllers\AuthController::class,'forgot']);

Route::get('/tasks',[App\Http\Controllers\TugasController::class,'tasks']);
Route::post('/postTugas',[App\Http\Controllers\TugasController::class,'postTugas']);

Route::get('/materi',[App\Http\Controllers\MateriController::class,'materi']);
Route::get('/profile',[App\Http\Controllers\AuthController::class,'profile']);
Route::get('/download',[App\Http\Controllers\AuthController::class,'download']);

Route::get('/newTask',[App\Http\Controllers\TugasController::class,'newTask']);
//Route::post('/postNewTugas',[App\Http\Controllers\TugasController::class,'postNewTugas']);

Route::get('/newMateri',[App\Http\Controllers\MateriController::class,'newMateri']);
Route::post('/postNewMateri', [MateriController::class, 'postNewMateri']);

Route::get('/welcome_lecturer',[App\Http\Controllers\AuthController::class,'welcome_lecturer']);
Route::get('/profile_lecturer',[App\Http\Controllers\AuthController::class,'profile_lecturer']);

Route::get('/welcome_admin',[App\Http\Controllers\AuthController::class,'welcome_admin']);
Route::get('/profile_admin',[App\Http\Controllers\AuthController::class,'profile_admin']);

Route::get('/add_task',[App\Http\Controllers\TugasController::class,'add_task']);
Route::put('/editTugas',[AdminController::class, 'editTugas']);
Route::delete('/hapusTugas',[AdminController::class, 'hapusTugas']);

Route::get('/add_materi',[App\Http\Controllers\MateriController::class,'add_materi']);
Route::get('/add_user',[App\Http\Controllers\AdminController::class,'add_user']);
