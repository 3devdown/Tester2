<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Business\BusinessController;
use App\Http\Controllers\Business\DepartmentController;
// use App\Http\Controllers\BusinessLoginController;
// use App\Http\Controllers\Business\RegisterController;


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

Route::group( [ 'prefix' => LaravelLocalization::setLocale(),
                'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function()
{
    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// require_once __DIR__ . '/auth.php';
// Test 
Route::group( [ 'prefix' => LaravelLocalization::setLocale(), 'where'=>['locale'=>'[a-zA-Z]{2}'],
                'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function()
{
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('business-home', [BusinessController::class, 'home'])->name('business.home');
// Route::get('business-index', [BusinessController::class, 'index'])->name('business.index');
// Route::get('business-login', [BusinessLoginController::class, 'showLoginForm'])->name('business.login');
// Route::get('business-register', [BusinessRegisterController::class, 'showRegisterForm'])->name('business.register');

// Route::post('business-login', [BusinessLoginController::class, 'login'])->name('business.login.submit');
// Route::post('business-register', [BusinessRegisterController::class, 'register'])->name('business.register.submit');
// Route::post('/business-logout', [BusinessLoginController::class, 'logout'])->name('business.logout');

Route::get('department-add', [DepartmentController::class, 'deptadd'])->name('department.add');
Route::get('department-view', [DepartmentController::class, 'deptview'])->name('department.view');
Route::get('department-edit', [DepartmentController::class, 'deptedit'])->name('department.edit');

Route::post('department-add', [DepartmentController::class, 'department_add'])->name('department.add.submit');
// Route::get('edit-dept/{deptid}/{slanguage}',  [DepartmentController::class, 'department_id'])->name('edit.dept');
Route::get('edit-dept/{deptid}/{slanguage}',  [DepartmentController::class, 'department_id'])->name('edit.dept');
Route::post('update-dept/{deptid}/{slanguage}',  [DepartmentController::class, 'department_update'])->name('update.dept');
Route::get('delete-dept/{deptid}/{slanguage}',  [DepartmentController::class, 'department_delete'])->name('delete.dept');

// // Route::get('department-view', [DepartmentController::class, 'deptview'])->name('department.view');
Route::post('dept_search', [DepartmentController::class, 'department_search'])->name('department.search');
});