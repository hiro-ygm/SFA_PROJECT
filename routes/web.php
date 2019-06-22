<?php

Route::get('/', function () {
    return redirect('/index');
});

Route::get('/index', 'IndexController@index')->name('index');

Route::get('/calendar/index', 'CalendarController@index')->name('calendar.index');

Route::get('/customer/index', 'CustomerController@index')->name('customer.index');

Route::get('/project/index', 'ProjectController@index')->name('project.index');

Route::get('/chat/index', 'ChatController@index')->name('chat.index');
Route::get('/chat/create', 'ChatController@create')->name('chat.create');
Route::get('/chat/show/{room_id?}', 'ChatController@show')->name('chat.show');

Route::get('/analysis/index', 'AnalysisController@index')->name('analysis.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
