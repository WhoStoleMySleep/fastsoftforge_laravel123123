<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'home']);
Route::get('/projects', [PagesController::class, 'projects']);
Route::post('/submit_order', [PagesController::class, 'submit_order']);
Route::get('/login', [PagesController::class, 'login']);
Route::get('/login/submit_login', [PagesController::class, 'submit_login']);
Route::get('/admin', [PagesController::class, 'admin']);
Route::get('/exit_user', [PagesController::class, 'exit_user']);
Route::get('/admin/{user}', [PagesController::class, 'admin_messager']);
Route::get('/{user}', [PagesController::class, 'user']);
Route::get('/{user}/send_message', [PagesController::class, 'send_message']);
Route::get('/admin/{user}/admin_send_message', [PagesController::class, 'admin_send_message']);
