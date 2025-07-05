<?php

use App\Http\Controllers\Admin\ClusterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserClusterController;
use App\Http\Controllers\Admin\UserMenuController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\LoginController as Auths;
use App\Models\NoSurat;
use Illuminate\Support\Facades\Redirect;

// Route::get('suratmasuk', SuratMasuk::class);

// Route::get('/', function () {
//     return view('app.welcome');
// });

// Auth::routes();

// Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);
// Route::resource('photos', PhotoController::class)->only(['index', 'show']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/landing', [App\Http\Controllers\HomeController::class, 'landing'])->name('landing');

// Route::get('/', [DashboardController::class, 'home'])->name('index');
Route::get('/data', [DashboardController::class, 'data'])->name('index.data');


Route::domain('')->group(function (): void {
    // Auth::routes();

    Route::get('/auth/login', [Auths::class, 'index'])->name('admin.login');
    Route::post('/auth/login', [Auths::class, 'login'])->name('login');
    Route::get('/auth/reset', [Auths::class, 'reset'])->name('reset');
    Route::post('/auth/reset', [Auths::class, 'reset_password'])->name('reset.password');

    Route::get('/logout', [Auths::class, 'logout'])->middleware('auth')->name('logout');


    // ADMIN_ROUTES
    Route::group(['prefix' => 'admin',   'middleware' => ['web', 'auth']], function (): void {

        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::get('/pedoman', [DashboardController::class, 'pedoman'])->name('admin.pedoman');
        Route::get('/get-indikator-kinerja/{id}', [DashboardController::class, 'getIndikatorKinerja']);


        # APPS 
        Route::group(['prefix' => '/clusters'], function (): void {
            Route::get('/', [ClusterController::class, 'index'])->name('clusters.index');
            Route::get('/data', [ClusterController::class, 'data'])->name('clusters.data');
            Route::get('/create', [ClusterController::class, 'create'])->name('clusters.create');
            Route::post('/store', [ClusterController::class, 'store'])->name('clusters.store');
            Route::get('/{id}/edit', [ClusterController::class, 'edit'])->name('clusters.edit');
            Route::put('/{id}', [ClusterController::class, 'update'])->name('clusters.update');
            Route::delete('/{id}', [ClusterController::class, 'destroy'])->name('clusters.delete');
        });

        Route::group(['prefix' => '/user-clusters'], function (): void {
            Route::get('/', [UserClusterController::class, 'index'])->name('user-clusters.index');
            Route::get('/data', [UserClusterController::class, 'data'])->name('user-clusters.data');
            Route::get('/create', [UserClusterController::class, 'create'])->name('user-clusters.create');
            Route::post('/store', [UserClusterController::class, 'store'])->name('user-clusters.store');
            Route::get('/{id}/edit', [UserClusterController::class, 'edit'])->name('user-clusters.edit');
            Route::put('/{id}', [UserClusterController::class, 'update'])->name('user-clusters.update');
            Route::delete('/{id}', [UserClusterController::class, 'destroy'])->name('user-clusters.delete');
        });

        # USER SETTING
        Route::group(['prefix' => '/roles'], function (): void {
            Route::get('/', [RoleController::class, 'index'])->name('roles.index');
            Route::get('/data', [RoleController::class, 'data'])->name('roles.data');
            Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('/{id}', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
        });

        Route::group(['prefix' => '/menus'], function (): void {
            Route::get('/', [MenuController::class, 'index'])->name('menus.index');
            Route::get('/data', [MenuController::class, 'data'])->name('menus.data');
            Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
            Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
            Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
            Route::put('/{id}', [MenuController::class, 'update'])->name('menus.update');
            Route::delete('/{id}', [MenuController::class, 'destroy'])->name('menus.delete');
        });


        Route::group(['prefix' => '/user-menus'], function (): void {
            Route::get('/', [UserMenuController::class, 'index'])->name('user-menus.index');
            Route::get('/data', [UserMenuController::class, 'data'])->name('user-menus.data');
            Route::post('/store', [UserMenuController::class, 'store'])->name('user-menus.store');
            Route::get('/{id}/edit', [UserMenuController::class, 'edit'])->name('user-menus.edit');
            Route::get('/{id}/show', [UserMenuController::class, 'show'])->name('user-menus.show');
            Route::delete('/{id}', [UserMenuController::class, 'destroy'])->name('user-menus.delete');
        });
        Route::get('user-menus/create/{id}', [UserMenuController::class, 'create'])->name('user-menus.create');


        Route::group(['prefix' => '/users'], function (): void {
            Route::get('/', [UsersController::class, 'index'])->name('users.index');
            Route::get('/data', [UsersController::class, 'data'])->name('users.data');
            Route::get('/create', [UsersController::class, 'create'])->name('users.create');
            Route::post('/store', [UsersController::class, 'store'])->name('users.store');
            Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
            Route::put('/{id}', [UsersController::class, 'update'])->name('users.update');
            Route::delete('/{id}', [UsersController::class, 'destroy'])->name('users.delete');
            Route::get('/profile/{id}', [UsersController::class, 'profile'])->name('users.profile');
        });
    });
});
