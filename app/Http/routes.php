<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return Redirect::to('auth/login');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::group(['middleware' => 'auth', 'as' => 'ruban.'], function () {
Route::resource('projects', 'ProjectController');
Route::resource('cards', 'CardController');
Route::resource('groups', 'GroupController');
Route::resource('users', 'UserController');
Route::resource('districts', 'DistrictController');
Route::resource('permissions', 'PermissionController');
Route::resource('tasks', 'TaskController');
Route::resource('payouts', 'PayoutController');
Route::resource('disputes', 'DisputeController');
Route::get('projects/{id}/delete', array('as'=>'projects.delete','uses'=>'ProjectController@destroy'));
Route::get('cards/{id}/delete', array('as'=>'cards.delete','uses'=>'CardController@destroy'));
Route::get('groups/{id}/delete', array('as'=>'groups.delete','uses'=>'GroupController@destroy'));
Route::get('users/{id}/delete', array('as'=>'users.delete','uses'=>'UserController@destroy'));
Route::get('permissions/{id}/delete', array('as'=>'permissions.delete','uses'=>'PermissionController@destroy'));
Route::get('home',array('as'=>'ruban.home','uses'=>'DashboardController@index'));
Route::get('districtsimport', array('as'=>'districts.import','uses'=>'DistrictController@import'));
Route::post('districtsimport', array('as'=>'districts.import','uses'=>'DistrictController@storeimport'));
Route::get('districts/{id}/delete', array('as'=>'districts.delete','uses'=>'DistrictController@destroy'));
Route::post('getdistrict', array('as'=>'districts.getdistrict','uses'=>'DistrictController@getdistrict'));
Route::post('gettaluk', array('as'=>'districts.gettaluk','uses'=>'DistrictController@gettaluk'));
 Route::post('cards/district/ajax', array('as'=>'districts.ajax','uses'=>'CardController@ajaxDistrict'));
 Route::put('cards/{id}/assignupdate', array('as'=>'cards.assignupdate','uses'=>'CardController@updatepartner'));
   Route::get('updateprofile/{id}', array('as'=>'users.profile','uses'=>'UserController@updateprofile'));
  Route::put('updateprofile/{id}', array('as'=>'users.profile','uses'=>'UserController@profileudpate'));
  
Route::get('camps/create/{id}', array('as'=>'camps.create','uses'=>'CampController@create'));
Route::post('camps/{id}', array('as'=>'camps.store','uses'=>'CampController@store'));
Route::get('camps/{id}/edit/{cid}', array('as'=>'camps.edit','uses'=>'CampController@edit'));
Route::put('camps/{id}/edit/{campid}', array('as'=>'camps.update','uses'=>'CampController@update'));
Route::get('camps/{campid}', array('as'=>'camps.view','uses'=>'CampController@update'));
Route::get('camps/{campid}/delete', array('as'=>'camps.delete','uses'=>'CampController@destroy'));
Route::post('getcamp', array('as'=>'camps.getcamp','uses'=>'CampController@getcamp'));
        Route::get('camps/{campid}/import', array('as'=>'camps.import','uses'=>'CampController@import'));
        Route::post('camps/{campid}/import', array('as'=>'camps.import','uses'=>'CampController@storeimport'));
        Route::get('filename/{ccid}/field/{fid}', array('as'=> 'camps.download','uses' => 'CampController@doDownload'));
        Route::post('projects/district/ajax', array('as'=>'projects.ajax','uses'=>'ProjectController@ajaxDistrict'));
        Route::get('tasks/{id}/delete', array('as'=>'tasks.delete','uses'=>'TaskController@destroy'));
        Route::get('taskimport', array('as'=>'tasks.import','uses'=>'TaskController@import'));
        Route::post('taskimport', array('as'=>'tasks.import','uses'=>'TaskController@storeimport'));
        Route::get('dispute/{did}/project', array('as'=>'disputes.project','uses'=>'DisputeController@project_index'));
        Route::get('projects/{did}/payment', array('as'=>'payouts.payment','uses'=>'PayoutController@create'));
        Route::post('projects/{did}/payment', array('as'=>'payouts.store','uses'=>'PayoutController@store'));
        
        Route::get('camps/{campid}/orderimport', array('as'=>'camps.orderimport','uses'=>'CampController@orderimport'));
        Route::post('camps/{campid}/orderimport', array('as'=>'camps.orderimport','uses'=>'CampController@storeorderimport'));
        Route::get('camps/{campid}/order', array('as'=>'camps.order','uses'=>'CampController@order'));
        Route::get('card/{caid}/camp/{camp}', array('as'=>'camps.show','uses'=>'CampController@show'));
        
        Route::get('card/{cid}/camp/{ca}/taskimport', array('as'=>'tasks.taskimport','uses'=>'TaskController@import'));
        Route::post('card/{cid}/camp/{ca}/taskimport', array('as'=>'tasks.taskimport','uses'=>'TaskController@storeimport'));
        Route::get('card/{cid}/camp/{ca}/tasklist', array('as'=>'tasks.tasklist','uses'=>'TaskController@index'));
        
});

Route::get('home',array('as'=>'ruban.home','uses'=>'DashboardController@index'));

