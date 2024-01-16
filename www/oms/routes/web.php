<?php

use App\Http\Controllers\Admin\UsersController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//fullcalender
Route::get('/calendar', 'CalendarController@index')->name('calendar');
Route::post('/calendar/create', 'CalendarController@create')->name('calendar.create');
Route::post('/calendar/update', 'CalendarController@update')->name('calendar.update');
Route::post('/calendar/delete', 'CalendarController@destroy')->name('calendar.destroy');

// Admin Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function () {

    Route::resource('departments', 'DepartmentsController')->except(['show']);
    Route::resource('designations', 'DesignationsController')->except(['show']);
    Route::resource('users', 'UsersController')->except(['create', 'store']);
    Route::resource('roles', 'RolesController')->except(['show']);
    Route::resource('basic_salaries', 'BasicSalariesController');
    Route::resource('monthly_salaries', 'MonthlySalariesController');
    Route::resource('projects', 'ProjectsController');
    Route::resource('tasks', 'TasksController')->except(['create']);
    Route::get('tasks/{tasks}/create', 'TasksController@create')->name('tasks.create');
    Route::resource('teams', 'TeamsController');
    Route::resource('ratings', 'RatingsController');
    Route::get('attendanceReport', 'ReportsController@attendanceReport')->name('reports.attendanceReport');
    Route::get('salaryReport', 'ReportsController@salaryReport')->name('reports.salaryReport');
});

// Admin and Sub-admin Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-user')->group(function () {

    Route::resource('employees', 'EmployeesController');
    Route::resource('attendances', 'AttendancesController');
    Route::resource('events', 'EventsController');
});

// Employee Routes
Route::namespace('Employee')->prefix('employee')->name('employee.')->group(function () {

    Route::resource('employees', 'EmployeesController')->only(['index', 'show']);
    Route::resource('attendances', 'AttendancesController')->only(['show']);
    Route::resource('events', 'EventsController')->only(['index']);
    Route::resource('projects', 'ProjectsController')->only(['index', 'show']);
    Route::resource('tasks', 'TasksController')->only(['index', 'show', 'store', 'edit', 'update']);
    Route::get('tasks/{tasks}/create', 'TasksController@create')->name('tasks.create');
});
