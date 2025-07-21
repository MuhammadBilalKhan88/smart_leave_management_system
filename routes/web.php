<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpolyeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthEmployee;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Auth::routes();

Route::get('/',  [HomeController::class, 'index'])->name('index');

Route::middleware(['auth', AuthEmployee::class])->group(function () {

    Route::get('/',  [EmpolyeeController::class, 'index'])->name('index');
    
    Route::get('/leavesForm',  [EmpolyeeController::class, 'employee_leaves_request_form'])->name('employee.leaves.request.form');
    Route::post('/leavesFrom',[EmpolyeeController::class, 'employee_leaves_request_store'])->name('employee.leaves.request.store');
    Route::get('/leavesFormHistory',  [EmpolyeeController::class, 'employee_leaves_request_history'])->name('employee.leaves.request.histroy');
});

Route::middleware(['auth', AuthAdmin::class])->group(function () {

    Route::get('/admin',  [AdminController::class, 'admin_index'])->name('admin.index');

    Route::get('/admin/leaverequest',  [AdminController::class, 'admin_all_leaves_requests'])->name('admin.leave_request');


    Route::get('/admin/employees',  [AdminController::class, 'admin_all_employees'])->name('admin.all_employees');
    Route::get('/admin/employee/add', [AdminController::class, 'admin_employee_add'])->name('admin.employee.add');
    Route::POST('/admin/employee/store', [AdminController::class, 'admin_employee_store'])->name('admin.employee.store');
    Route::get('/admin/employee/edit/{id}', [AdminController::class, 'admin_employee_edit'])->name('admin.employee.edit');
    Route::put('/admin/employee/update', [AdminController::class, 'admin_employee_update'])->name('admin.employee.update');
    Route::Delete('/admin/employee/delete/{id}', [AdminController::class, 'admin_employee_delete'])->name('admin.employee.delete');




    Route::get('/admin/users',  [AdminController::class, 'admin_all_users'])->name('admin.all_users');
    Route::PUt('/admin/users/{id}',  [AdminController::class, 'admin_users_edit'])->name('admin.edit_users');

    Route::get('/admin/register', [RegisterUserController::class, 'admin_user_register'])->name('admin.register');
    Route::post('/admin/register', [RegisterUserController::class, 'admin_user_store'])->name('admin.register.store');
});
