
<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/user', [App\Http\Controllers\UsersController::class, 'index'])
    ->name('index_user');

Route::get('/admin/create_user', [App\Http\Controllers\UsersController::class, 'index_create'])
    ->name('index_create_user');

Route::post('/admin/user/create', [App\Http\Controllers\UsersController::class, 'create'])
    ->name('create_user');

Route::get('/admin/index_confirm_delete', [App\Http\Controllers\UsersController::class, 'confirm_delete'])
    ->name('index_confirm_delete');

Route::post('/admin/user/delete', [App\Http\Controllers\UsersController::class, 'delete'])
    ->name('delete_user');

Route::get('/admin/index_edit_user', [App\Http\Controllers\UsersController::class, 'index_update_user'])
    ->name('index_update_user');

Route::post('/admin/user/update', [App\Http\Controllers\UsersController::class, 'update'])
    ->name('update_user');
Route::post('/admin/update_status', [App\Http\Controllers\UsersController::class, 'updateStatus'])->name('update_status');


Route::get('/admin/search_users', [App\Http\Controllers\UsersController::class, 'searchUsers'])->name('search_users');




