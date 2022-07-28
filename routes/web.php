<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
//     Route::view('dashboard', 'dashboard')->name('dashboard');
//     Route::view('forms', 'forms')->name('forms');
//     Route::view('cards', 'cards')->name('cards');
//     Route::view('charts', 'charts')->name('charts');
//     Route::view('buttons', 'buttons')->name('buttons');
//     Route::view('modals', 'modals')->name('modals');
//     Route::view('tables', 'tables')->name('tables');
//     Route::view('calendar', 'calendar')->name('calendar');
// });

Route::middleware(['auth:sanctum', 'lang', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // User & Profile...
    Route::get('/user/profile', [UserProfileController::class, 'show'])
        ->name('profile.show');

    // API...
    if (Jetstream::hasApiFeatures()) {
        Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
    }

    // Teams...
    if (Jetstream::hasTeamFeatures()) {
        Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
        Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
        Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
    }

    // Dashboard

    Route::get('users/lang/{lang}', [\App\Http\Controllers\UserController::class, 'updatelang'])->name('user.lang');
    // Route::get('/permissions', \App\Http\Livewire\Permission\Index::class);
    Route::get('/roles', \App\Http\Livewire\Role\Index::class)->name('roles.index');
    Route::get('/roles/{id}', \App\Http\Livewire\Permission\Index::class)->name('roles.assign');
    // example component
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('forms', 'forms')->name('forms');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');
});