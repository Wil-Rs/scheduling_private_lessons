<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resources
// GET 	     | /photos	             | index   | photos.index
// GET	     | /photos/create	     | create  | photos.create
// POST	     | /photos	             | store   | photos.store
// GET	     | /photos/{photo}	     | show	   | photos.show
// GET	     | /photos/{photo}/edit	 | edit	   | photos.edit
// PUT/PATCH | /photos/{photo}	     | update  | photos.update
// DELETE	 | /photos/{photo}   	 | destroy | photos.destroy

Route::group([ 'middleware' => 'auth' ], function () {
    Route::resources([
        'teachers' => App\Http\Controllers\TeacherController::class,
        'students' => App\Http\Controllers\StudentController::class,
        'schedules' => App\Http\Controllers\ScheduleController::class,
    ]);

    Route::post('/teachers/search', [App\Http\Controllers\TeacherController::class, 'search']);
    Route::post('/students/search', [App\Http\Controllers\StudentController::class, 'search']);
    Route::post('/schedules/search', [App\Http\Controllers\ScheduleController::class, 'search']);

});
