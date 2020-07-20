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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profileView')->name('profile');

Route::get('/staff/add', 'StaffController@addStaff')->name('addStaff');
Route::get('staff/{id}/edit', 'StaffController@editStaffInfo')->name('editStaff');
Route::post('registerStaff', ['as'=> 'register_staff', 'uses' => 'StaffController@registerStaff']);
Route::get('displayStaff', ['as'=> 'display_staff_list', 'uses' => 'StaffController@displayStaffList']);
Route::post('editprofile', ['as'=> 'edit_profile', 'uses' => 'UserController@editprofile']);
Route::post('editcontactnumber', ['as'=> 'edit_contact_number', 'uses' => 'UserController@editcontactnumber']);
Route::post('editpassword', ['as'=> 'edit_password', 'uses' => 'UserController@changepassword']);
Route::post('editprofilepicture', ['as'=> 'change_profile_picture', 'uses' => 'UserController@editprofilepicture']);
