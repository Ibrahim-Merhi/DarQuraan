<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(
    [
        'register' => false,
        'reset' => false,
        'verify' => false,
    ]
);

//auth routes group middleware

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [App\Http\Controllers\StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [App\Http\Controllers\StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{id}/edit', [App\Http\Controllers\StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students_update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');





    //users routes
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/user/password', [App\Http\Controllers\UserController::class, 'ChangePassword'])->name('users.password');
    Route::post('/userupdate/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

    Route::post('/user/password', [App\Http\Controllers\UserController::class, 'UpdatePassword'])->name('users.change-password');


    //revisions routes
    Route::get('/revisions', [App\Http\Controllers\RevisionController::class, 'index'])->name('revisions.index');
    Route::get('/students/{id}/sheet', [App\Http\Controllers\RevisionController::class, 'sheet'])->name('students.sheet');
    Route::get('/revisions/create/{id}', [App\Http\Controllers\RevisionController::class, 'create'])->name('revisions.create');
    Route::post('/revisions/store', [App\Http\Controllers\RevisionController::class, 'store'])->name('revisions.store');

    //time sheets routes

    Route::get('/times', [App\Http\Controllers\TimesheetController::class, 'index'])->name('time.index');
    Route::get('/times/{id}', [App\Http\Controllers\TimesheetController::class, 'TimeById'])->name('time.byid');

    Route::get('/time/{id}', [App\Http\Controllers\TimesheetController::class, 'edit'])->name('time.edit');


    Route::get('/times_create', [App\Http\Controllers\TimesheetController::class, 'create'])->name('time.create');
    Route::post('/time/store', [App\Http\Controllers\TimesheetController::class, 'store'])->name('time.store');
});


//end auth routes group/


Route::get('/', function () {
    return redirect('/home');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/home');
});
