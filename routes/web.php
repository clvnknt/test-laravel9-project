<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\FriendController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/inquiries', [InquiryController::class, 'index']);
Route::get('/friends', [FriendController::class, 'index']);
Route::get('/edit-friend/{id}', [FriendController::class, 'showEditForm']);
Route::post('/save-edit-form', [FriendController::class, 'saveFriendChanges']);