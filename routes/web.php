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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::match(['GET', 'POST'],'register','Admin\adminController@register')->name('register');

Route::group(['middleware' => ['beforeloginAuth']], function () {
    Route::get('login',       'Admin\adminController@login')->name('login');
    Route::post('login-post', 'Admin\adminController@loginpost')->name('login-post');
   
});

Route::group(['middleware' => ['afterloginAuth']], function () {
    Route::get('dashboard',   'Admin\adminController@dashboard')->name('dashboard');
    Route::get('Dashboard',   'User\userController@Dashboard')->name('Dashboard');
    Route::match(['GET', 'POST'],'change_password','Admin\adminController@change_password')->name('change_password');
   
    Route::get('logout',	  'Admin\adminController@logout')->name('logout');
    
    //user-management
 Route::get('usermanagement',	                  'User\userController@usermanagement')->name('usermanagement');
 Route::match(['get','post'],'/add-user',         'User\userController@adduser')->name('add-user');
 Route::match(['get','post'],'/delete-user/{id}', 'User\userController@deleteuser')->name('delete-user');
 Route::match(['get','post'],'/edit-user/{id}',   'User\userController@edituser')->name('edit-user');
 Route::get('Trash_user',                         'User\userController@trashuser')->name('Trash_user');
 Route::match(['get','post'],'/restoreuser/{id}', 'User\userController@restoreuser')->name('restore-user');
 Route::match(['get','post'],'/forcedelete/{id}', 'User\userController@forceDelete')->name('forcedelete');

});


//social login
 Route::get('login/{provider}',          'Admin\adminController@redirect');
 Route::get('login/{provider}/callback', 'Admin\adminController@Callback');

 

 //firebase management
 Route::get('firebasemanagement',     'firebase\FirebaseController@firebasemanagement')->name('firebasemanagement');
 Route::post('add-student',	           'firebase\FirebaseController@store')->name('add-student');

 //Botman chatbot 
 Route::view('chatbot',                   'Admin.chatbot');
 Route::match(['get','post'],'/botman' ,  'Admin\BotManController@handle');
 


