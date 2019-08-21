<?php

Route::get('/', function () {
    return redirect('/index');
});

Route::get('/index', 'IndexController@index')->name('index');
// //calendar
Route::get('/calendar/index', 'CalendarController@index')->name('calendar.index');
Route::get('/calendar/create', 'CalendarController@create')->name('calendar.create');
Route::get('/calendar/show/{id}', 'CalendarController@show')->name('calendar.show');
Route::get('/calendar/index/{year?}/{month?}', 'CalendarController@index')->name('calendar.index');
Route::post('/calendar/store', 'CalendarController@store')->name('calendar.store');
Route::get('/calendar/edit/{id}', 'CalendarController@edit')->name('calendar.edit');
Route::post('/calendar/edit/{id}', 'CalendarController@update')->name('calendar.update');
Route::delete('/calendar/{id}', 'CalendarController@destroy')->name('calendar.destroy');

//process
Route::get('/process/index', 'ProcessController@index')->name('process.index');
Route::get('/process/create', 'ProcessController@create')->name('process.create');
Route::post('/process/store', 'ProcessController@store')->name('process.store');
Route::get('/process/show/{id}', 'ProcessController@show')->name('process.show');
Route::get('/process/edit/{id}', 'ProcessController@edit')->name('process.edit');
Route::post('/process/edit/{id}', 'ProcessController@update')->name('process.update');
Route::delete('/process/{id}', 'ProcessController@destroy')->name('process.destroy');

//customer
Route::get('/customer/index', 'CustomerController@index')->name('customer.index');
Route::get('/customer/show/{id}', 'CustomerController@show')->name('customer.show');
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer/create', 'CustomerController@store')->name('customer.store');
Route::delete('/customer/{id}', 'CustomerController@destroy')->name('customer.destroy');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer/update/{id}', 'CustomerController@update')->name('customer.update');

//project
Route::get('/project/index', 'ProjectController@index')->name('project.index');
Route::get('/project/show/{id}', 'ProjectController@show')->name('project.show');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/project/create/', 'ProjectController@store')->name('project.store');
Route::delete('/project/{id}', 'ProjectController@destroy')->name('project.destroy');
Route::get('/project/edit/{id}', 'ProjectController@edit')->name('project.edit');
Route::post('/project/update/{id}', 'ProjectController@update')->name('project.update');

//chat
Route::get('/chat/index', 'ChatController@index')->name('chat.index');
Route::post('/chat/create', 'ChatController@create')->name('chat.create');
Route::get('/chat/show/{room_id}', 'ChatController@show')->name('chat.show');
Route::delete('/chat/{room_id}','ChatController@destroy')->name('chatMessage.delete');

//analysis
Route::get('/analysis/index', 'AnalysisController@index')->name('analysis.index');
Route::get('/analysis/index/{year?}', 'AnalysisController@index')->name('analysis.index');
Route::get('/analysis/create/{year?}', 'AnalysisController@create')->name('analysis.create');
Route::post('/analysis/create/{year?}', 'AnalysisController@store')->name('analysis.store');
Route::get('/analysis/edit/{id}', 'AnalysisController@edit')->name('analysis.edit');
Route::post('/analysis/update/{id}', 'AnalysisController@update')->name('analysis.update');
Route::get('/analysis/show}', 'AnalysisController@show')->name('analysis.show');

// Route::get('/user/index', 'UserrController@index')->name('user.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
