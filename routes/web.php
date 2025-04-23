<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeProjectController;

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
Route::get('/all-employees', [DashboardController::class, 'emp'])->name('employees.all');
Route::get('/employees-projects', [DashboardController::class, 'employeesProjects'])->name('employees.projects');
Route::get('/all-projects', [DashboardController::class, 'index'])->name('projects.all');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/assign', [EmployeeProjectController::class, 'index'])->name('assign.index');
Route::post('/add-employee', [EmployeeProjectController::class, 'storeEmployee'])->name('employee.store');
Route::post('/add-project', [EmployeeProjectController::class, 'storeProject'])->name('project.store');
Route::post('/assign-projects', [EmployeeProjectController::class, 'assign'])->name('assign.projects');


Route::get('/', function () {
    return view('welcome');
});
