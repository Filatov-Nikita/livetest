<?php

Route::get('/', 'PagesController@showMainPage')->name('admin.mainPage');
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
Route::get('/tests/answer/toggle/{answer_id}', 'CrudAnswersController@toggle')->name('admin.toggleAnswer');
Route::get('/tests/answer/add/{question_id}', 'CrudAnswersController@addShowForm')->name('admin.showAddAnswersForm');
Route::post('/tests/answer/add/{question_id}', 'CrudAnswersController@addPost');
Route::get('/tests/answer/edit/{answer_id}', 'CrudAnswersController@edit')->name('admin.editAnswer');
Route::post('/tests/answer/edit/{answer_id}', 'CrudAnswersController@editPost');
Route::get('/results', 'PagesController@showResultsPage')->name('admin.resultsPage');