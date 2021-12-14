<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    return view('landing-page');
});

// Redirect to login when user tends to type unregistered route
Route::fallback(function () {
    return redirect('/login');
});

//Google Login
Route::prefix('google')->name('google.')->group( function(){
    Route::get('auth', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

//Facebook Login
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FacebookController::class, 'loginWithFacebook'])->name('login');
    Route::any('callback', [FacebookController::class, 'callbackFromFacebook'])->name('callback');
});
Auth::routes();

// Authenticated navigation
Route::group(['middleware' => ['preventBackHistory', 'auth']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// RBAC
Route::group(['middleware' => ['preventBackHistory', 'auth', 'permission:rbac']], function(){
    Route::get('roles', [RoleController::class, 'index']);
    Route::get('listroles', [RoleController::class, 'listroles'] );
    Route::post('roles/create', [RoleController::class, 'create'] );
    Route::get('roles/edit/{id}', [RoleController::class, 'edit']);
    Route::post('roles/update', [RoleController::class, 'update']);
    Route::get('roles/destroy/{id}', [RoleController::class, 'destroy']);

    Route::get('permissions', [PermissionController::class, 'index']);
    Route::get('listpermissions', [PermissionController::class, 'listpermissions'] );
    Route::post('permissions/create', [PermissionController::class, 'create'] );
    Route::get('permissions/edit/{id}', [PermissionController::class, 'edit']);
    Route::post('permissions/update', [PermissionController::class, 'update']);
    Route::get('permissions/destroy/{id}', [PermissionController::class, 'destroy']);

    Route::get('role-has-permissions', [RoleHasPermissionController::class, 'index']);
    Route::get('listrolehaspermissions', [RoleHasPermissionController::class, 'listrolehaspermissions'] );
    Route::post('role-has-permissions/create', [RoleHasPermissionController::class, 'create'] );
    Route::get('role-has-permissions/destroy/{role_id}/{permission_id}', [RoleHasPermissionController::class, 'destroy']);

    Route::get('model-has-permissions', [ModelHasPermissionController::class, 'index']);
    Route::get('listmodelhaspermissions', [ModelHasPermissionController::class, 'listmodelhaspermissions'] );
    Route::post('model-has-permissions/create', [ModelHasPermissionController::class, 'create'] );
    Route::get('model-has-permissions/destroy/{permission_id}/{user_id}', [ModelHasPermissionController::class, 'destroy']);

    Route::get('model-has-roles', [ModelHasRoleController::class, 'index']);
    Route::get('listmodelhasroles', [ModelHasRoleController::class, 'listmodelhasroles'] );
    Route::post('model-has-roles/create', [ModelHasRoleController::class, 'create'] );
    Route::get('model-has-roles/destroy/{role_id}/{user_id}', [ModelHasRoleController::class, 'destroy']);
});