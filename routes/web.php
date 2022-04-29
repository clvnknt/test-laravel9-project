<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\OrganizationController;

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
Route::post('/save-edit-friend', [FriendController::class, 'saveFriendChanges']);
Route::get('/new-friend-form', [FriendController::class, 'showNewForm']);
Route::post('/save-new-friend', [FriendController::class, 'saveNewFriend']);
Route::get('/delete-friend/{id}', [FriendController::class, 'deleteFriend']);

Route::get('/organizations', [OrganizationController::class, 'index']);
Route::get('/edit-organization/{id}', [OrganizationController::class, 'showEditForm']);
Route::post('/save-edit-organization', [OrganizationController::class, 'saveOrganizationChanges']);
Route::get('/add-organization-form', [OrganizationController::class, 'showNewForm']);
Route::post('/save-new-organization', [OrganizationController::class, 'saveNewOrganization']);
Route::get('/delete-organization/{id}', [OrganizationController::class, 'deleteOrganization']);