<?php

use App\Http\Controllers\faculty\faculty;
use App\Http\Controllers\fetchUsers;
use App\Http\Controllers\main;
use App\Http\Controllers\redirect;
use App\Http\Controllers\role;
use App\Http\Controllers\student\addStudent;
use App\Http\Controllers\student\fetch;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/getAuthRole', [role::class, 'getAuthRole']);
Route::post('/addstudent', [addStudent::class, 'addStudent']);
Route::post('/addFaculty', [faculty::class, 'addFaculty']);
Route::get('/getMembers', [main::class, 'fetch']);
Route::post('/getFilteredMembers', [main::class, 'getFilteredMembers']);
Route::post('/delete/{id}', [main::class, 'delete']);




Route::post('/createCourse', [main::class, 'createCourse']);
Route::get('/getUser', [main::class, 'getUser']);





Route::get('/getCourses', [main::class, 'getCourses']);
Route::post('/getFilteredCourses', [main::class, 'filteredCourses']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [redirect::class, 'red'])->name('dashboard');

    Route::get('/hod', function () {
        return view('Dashboards.hod');
    })->name('hod-dash');


    Route::get('/faculty', function () {
        return view('Dashboards.faculty');
    })->name('faculty-dash');


    Route::get('/stu', function () {
        return view('Dashboards.student');
    })->name('stu-dash');



    Route::post('/registerCourse/{id}', [main::class, 'registerCourse']);
    Route::get('/registeredCourses', [main::class, 'registeredCourses']);
    Route::get('/getStudentCount', [main::class, 'getStuCount']);
    Route::get('/getCourseCount', [main::class, 'getCourseCount']);
    Route::get('/getFcourses', [main::class, 'getFCourse']);
    Route::post('unregister/course/{id}', [main::class, 'unregisterCourse']);

    Route::get('/gcfr', [main::class, 'getCoursesForRegistration']);
    Route::post('/getStu/{id}', [main::class, 'getStu']);

    Route::post('markAttendance', [main::class, 'markAttendance']);
    Route::post('getAttendance', [main::class, 'getAttendance']);
    Route::post('checkAttendance', [main::class, 'checkAttendance']);
});
