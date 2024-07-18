<?php

use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\FormController as UserFormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserFormController::class, 'index'])->name('forms.index');
Route::match(array('GET', 'POST'),'/user_forms/{id}', [UserFormController::class, 'show'])->name('user_forms.show');

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('forms', FormController::class);
Route::get('/forms/{id}/submissions', [FormController::class, 'submissions'])->name('forms.submissions');
Route::get('/forms/{id}/submissions_show', [FormController::class, 'submissionsShow'])->name('forms.submissions_show');





