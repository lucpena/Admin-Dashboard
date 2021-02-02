<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Controllers 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

// Auth Routes
Auth::routes();

// Home
Route::get('/',     [AdminController::class, 'index'])->name('admin');
Route::get('/home', [AdminController::class, 'index'])->name('admin');

//Middleware de Autenticação
Route::middleware('auth')->group(function(){

    Route::get   ('/admin/users/{user}/profile', [UserController::class, 'show'   ])->name('user.profile.show');
    Route::put   ('/admin/users/{user}/update',  [UserController::class, 'update' ])->name('user.profile.update');
    Route::delete('/admin/users/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

});

// Middleware de Administrador
Route::middleware('role:Admin')->group(function(){

    // Roles
    Route::get   ('/roles',                [RoleController::class, 'index'             ])->name('roles.index');
    Route::post  ('/roles',                [RoleController::class, 'store'             ])->name('roles.store');
    Route::delete('/roles/{role}/destroy', [RoleController::class, 'destroy'           ])->name('roles.destroy');
    Route::get   ('/roles/{role}/edit',    [RoleController::class, 'edit'              ])->name('roles.edit');
    Route::put   ('/roles/{role}/update',  [RoleController::class, 'update'            ])->name('roles.update');
    Route::put   ('/roles/{role}/attach',  [RoleController::class, 'attach_permission' ])->name('roles.permission.attach');
    Route::put   ('/roles/{role}/detach',  [RoleController::class, 'detach_permission' ])->name('roles.permission.detach');

    // Permissions
    Route::get   ('/permissions',                      [PermissionController::class, 'index'  ])->name('permissions.index');
    Route::post  ('/permissions',                      [PermissionController::class, 'store'  ])->name('permissions.store');
    Route::delete('/permissions/{permission}/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::get   ('/permissions/{permission}/edit',    [PermissionController::class, 'edit'   ])->name('permissions.edit');
    Route::put   ('/permissions/{permission}/update',  [PermissionController::class, 'update' ])->name('permissions.update');

    Route::get('/admin/users',        [UserController::class, 'index' ])->name('users.index');
    Route::put('users/{user}/attach', [UserController::class, 'attach'])->name('user.role.attach');
    Route::put('users/{user}/detach', [UserController::class, 'detach'])->name('user.role.detach');

});