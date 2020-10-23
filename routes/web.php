<?php
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


Route::any('/', 'User\IndexController@home');
Route::any('/login', 'User\IndexController@login');
Route::any('/logout', 'User\IndexController@logout');
Route::any('/register', 'User\IndexController@register');

Route::any('/my-account', 'User\ProfileController@account');

Route::any('/reports', 'User\ReportController@reports');
Route::any('/add-report', 'User\ReportController@addEdit');
Route::any('/edit-report/{id}', 'User\ReportController@addEdit');

Route::any('/care-takers', 'User\CareTakerController@show');
Route::any('/book-care-taker/{id}', 'User\CareTakerController@book');

Route::any('/order', 'User\OrderController@show');
Route::any('/product-order/{id}', 'User\OrderController@order');

Route::any('/products', 'User\IndexController@product');

Route::any('/assign-care-taker', 'User\ReportController@assignCT');

// , 'middleware' => 'elseAdminLogin'
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin'), function () {
	Route::any('/', 'LoginController@login');
	Route::any('/logout', 'DashboardController@logout')->name('admin.logout');


	Route::any('/home', 'DashboardController@home');
	Route::any('/profile', 'DashboardController@profile');
	Route::any('/change-password', 'DashboardController@changePasword');

	Route::any('/patients', 'PatientController@show');
	Route::any('/add-patient', 'PatientController@addEdit');
	Route::any('/edit-patient/{id}', 'PatientController@addEdit');

	Route::any('/care-takers', 'CareTakerController@show');
	Route::any('/add-care-taker', 'CareTakerController@addEdit');
	Route::any('/edit-care-taker/{id}', 'CareTakerController@addEdit');
	Route::any('/care-taker-request', 'CareTakerController@Crequest');
	Route::any('/change-care-taker-request/{id?}', 'CareTakerController@change');

	Route::any('/patient-report', 'ReportController@show');
	Route::any('/edit-patient-report/{id}', 'ReportController@addEdit');

	Route::any('/products', 'ProductController@show');
	Route::any('/add-product', 'ProductController@addEdit');
	Route::any('/edit-product/{id}', 'ProductController@addEdit');


	Route::any('/order', 'ProductController@order');




});

Route::group(array('prefix' => 'employee', 'namespace' => 'careTaker'), function () {
	Route::any('/', 'LoginController@login');
	Route::any('/logout', 'DashboardController@logout')->name('employee.logout');


	Route::any('/home', 'DashboardController@home');
	Route::any('/profile', 'DashboardController@profile');
	Route::any('/change-password', 'DashboardController@changePasword');

	Route::any('/patient-report', 'ReportController@show');
	Route::any('/edit-patient-report/{id}', 'ReportController@addEdit');



});



// Route::get('/', function () {
//     return view('admin/index');
// });