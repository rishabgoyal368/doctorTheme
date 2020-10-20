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
		Route::any('/edit-care-takers/{id}', 'CareTakerController@addEdit');



    });



// Route::get('/', function () {
//     return view('admin/index');
// });