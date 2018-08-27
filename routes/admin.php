<?php

Route::get('/', 'PagesController@showMainPage');
Route::get('/tests', 'PagesController@showListTestsPage')->name('admin.showListTests');
Route::get('/tests/{id}', 'PagesController@showTestPage')->name('admin.showTestPage');
Route::get('/tests/{test_id}/question/add', 'CrudQuestionsController@addShowForm')->name('admin.showAddQuestionsForm');
Route::post('/tests/{test_id}/question/add', 'CrudQuestionsController@addPost');
Route::get('/tests/question/toggle/{question_id}', 'CrudQuestionsController@toggle')->name('admin.toggleQuestion');
Route::get('/tests/question/edit/{question_id}', 'CrudQuestionsController@edit')->name('admin.editQuestion');
Route::post('/tests/question/edit/{question_id}', 'CrudQuestionsController@editPost');
Route::get('/tests/toggle/{test_id}', 'CrudTestsController@toggle')->name('admin.toggleTest');
Route::get('/tests/edit/{test_id}', 'CrudTestsController@edit')->name('admin.editTest');
Route::post('/tests/edit/{test_id}', 'CrudTestsController@editPost');
Route::get('/test/add/', 'CrudTestsController@addShowForm')->name('admin.showAddTestsForm');
Route::post('/test/add', 'CrudTestsController@addPost');