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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// Auth routes
Route::group(['middleware' => 'auth'], function () {

    // log out can be used not only for dashboard if in the future we will add a user login logic
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    // Dashboard routes
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {

        Route::get('/', 'HomeController@index')->name('admin');

        // Companies routes
        Route::group(['prefix' => 'company'], function() {
            Route::get('/', 'CompanyController@index')->name('company.index');
            Route::get('/create', 'CompanyController@create')->name('company.create');
            Route::get('/edit/{id}', 'CompanyController@edit')->name('company.edit');
            Route::post('/store', 'CompanyController@store')->name('company.store');
            Route::post('/update/{id}', 'CompanyController@update')->name('company.update');
            Route::post('/delete/{id}', 'CompanyController@delete')->name('company.delete');
        });

        // Employees routes
        Route::group(['prefix' => 'employee'], function() {
            Route::get('/', 'EmployeeController@index')->name('employee.index');
            Route::get('/create', 'EmployeeController@create')->name('employee.create');
            Route::get('/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
            Route::post('/store', 'EmployeeController@store')->name('employee.store');
            Route::post('/update/{id}', 'EmployeeController@update')->name('employee.update');
            Route::post('/delete/{id}', 'EmployeeController@delete')->name('employee.delete');
        });

    });

});

// Client side routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/company/{id}/{slug}', 'HomeController@companyInner')->name('company.inner');
Route::get('/employee/{id}/{slug}', 'HomeController@employeeInner')->name('employee.inner');