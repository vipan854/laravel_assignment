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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'super-admin',  'middleware' => 'url.based.authenticate'], function()
{
    Route::get('dashboard', 'SuperAdminController@showAll' );
    Route::get('createViewer', 'SuperAdminController@createViewer' );
    Route::post('saveViewer', 'SuperAdminController@saveViewer' )->name('saveViewerBySuperAdmin');
    Route::get('editViewer/{viewerId}', 'SuperAdminController@editViewer' );
    Route::patch('updateViewer', 'SuperAdminController@updateViewer' );
    Route::delete('deleteViewer/{viewerId}', 'SuperAdminController@deleteViewer' );
});

Route::group(['prefix' => 'admin',  'middleware' => 'url.based.authenticate'], function()
{
    Route::get('dashboard', 'AdminController@showAll' );
    Route::get('createViewer', 'AdminController@createViewer' );
    Route::post('saveViewer', 'AdminController@saveViewer' )->name('saveViewerByAdmin');
    Route::get('editViewer/{viewerId}', 'AdminController@editViewer' );
    Route::patch('updateViewer', 'AdminController@updateViewer' );
    Route::delete('deleteViewer/{viewerId}', 'AdminController@deleteViewer' );
});

Route::group(['prefix' => 'manager',  'middleware' => 'url.based.authenticate'], function()
{
    Route::get('dashboard', 'ManagerController@showAll' );
    Route::get('createViewer', 'ManagerController@createViewer' );
    Route::post('saveViewer', 'ManagerController@saveViewer' )->name('saveViewerByManager');
    Route::get('editViewer/{viewerId}', 'ManagerController@editViewer' );
    Route::patch('updateViewer', 'ManagerController@updateViewer' );
});

Route::group(['prefix' => 'viewer',  'middleware' => 'url.based.authenticate'], function()
{
    Route::get('dashboard', 'ViewerController@showAll' );
});

Route::group(['prefix' => 'error'], function()
{
    Route::get('404', function(){
        return view('errors.404');
    });

    Route::get('401', function(){
        return view('errors.401');
    });

    Route::get('anyError', function(){
        return view('errors.anyError');
    })->name("anyError");
});