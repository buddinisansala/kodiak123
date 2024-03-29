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


Route::get('/', 'LandingPageController@index');

Route::get('/deals', 'DealsController@index');
Route::get('/details/{product}', 'DealsController@show')->name('details.show');


Route::get('/about', 'LandingPageController@about');
Route::get('/contact', 'LandingPageController@contact');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/offers', 'DashboardController@offers');
Route::post('/dashboard/profile', 'DashboardController@profile'); //advertiser profile page

Route::resource('/dashboard/offers', 'AdvertisementController');
Route::resource('/dashboard/profile', 'BusinessProfileController');
Route::resource('/dashboard/packeges', 'PackageController');
Route::resource('/dashboard/messages', 'MessagesController'); //->middleware('verified')
// Route::get('/dashboard/messages','MessagesController@send');

Auth::routes(['verify' => true]);


Route::resource('/superuser/dashboard', 'SuperuserController')->middleware('auth');
// unverified add controller
Route::resource('/dashboard/verifyAd', 'SuperuserAdvertisementController');

//admin verify reject add controller

Route::post('/dashboard/verifyAd/verify','SuperuserAdvertisementController@verify');
Route::post('/dashboard/verifyAd/reject','SuperuserAdvertisementController@reject');

//admin login controller

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

// send mail in superuser dashboard 
Route::get('superuser/email', 'MailController@index');
Route::post('superuser/send', 'MailController@sends');

//dashboard in superuser controller

Route::get('superuser/dashboard', 'GraphController@index');

