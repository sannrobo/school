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
        return view('dashboard'); 
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
    Route::get('/users', \App\Http\Livewire\User\Index::class)->name('users.index');
    Route::get('/students', \App\Http\Livewire\Student\Index::class)->name('students.index');
    Route::get('/students/create', \App\Http\Livewire\Student\Create::class)->name('students.create');
    Route::get('/students/detail/{id}', \App\Http\Livewire\Student\Detail::class)->name('students.info');
    Route::get('/students/edit/{id}', \App\Http\Livewire\Student\Edit::class)->name('students.edit');
    Route::get('/sections', \App\Http\Livewire\Sections\Index::class)->name('sections.index');
    Route::get('/class', \App\Http\Livewire\Class\Index::class)->name('class.index');
    Route::get('/courses', \App\Http\Livewire\Course\Index::class)->name('courses.index');
    Route::get('/rooms', \App\Http\Livewire\Room\Index::class)->name('rooms.index');
    Route::get('/employee', \App\Http\Livewire\Employee\Index::class)->name('emp.index');
    Route::get('/employee/create', \App\Http\Livewire\Employee\Create::class)->name('emp.create');
    Route::get('/employee/{id}', \App\Http\Livewire\Employee\Edit::class)->name('emp.edit');
    Route::get('/class/create', \App\Http\Livewire\Class\Create::class)->name('class.create');
    Route::get('/class/{id}/Edit', \App\Http\Livewire\Class\Edit::class)->name('class.edit');
    Route::get('/class/detail/{id}', \App\Http\Livewire\Class\Detail::class)->name('class.detail');
    Route::get('export-student/{id}',[App\Http\Controllers\UserController::class,'export'])->name('export-excel');
    Route::get('/attendance',\App\Http\Livewire\Attendance\Index::class)->name('att.index');
    Route::get('/attendance/report',\App\Http\Livewire\Attendance\Report::class)->name('attr.report');
    Route::get('/scores',\App\Http\Livewire\Score\Index::class)->name('score.index');
    Route::get('/invoices',\App\Http\Livewire\Account\Invoice::class)->name('inv.index');
    Route::get('/invoices/create',\App\Http\Livewire\Account\Create::class)->name('inv.create');
    Route::get('/income',\App\Http\Livewire\Account\Income::class)->name('income.index');
    Route::get('/', [\App\Http\Controllers\Dashboard::class, 'index'])->name('dashboard');
    Route::get('/invoices/print/{id}', [\App\Http\Controllers\Dashboard::class, 'printInvoice'])->name('invoice.print');
    Route::get('/class/result/{id}', \App\Http\Livewire\Score\Result::class)->name('result.index');
    Route::get('/class/result/print/{id}', [\App\Http\Controllers\Dashboard::class, 'printResult'])->name('result.print');
    Route::get('/class/result/export/{id}', [\App\Http\Controllers\UserController::class, 'exportResult'])->name('result.export');
    Route::get('/invoices/edit/{id}',\App\Http\Livewire\Account\Edit::class)->name('invoie.edit');
 
});