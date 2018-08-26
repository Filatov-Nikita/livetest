<?php

Route::get('/', 'PagesController@showMainPage');
Route::get('/tests', 'PagesController@showListTestsPage')->name('admin.showListTests');
Route::get('/tests/{id}', 'PagesController@showTestPage')->name('admin.showTestPage');
Route::get('/tests/{test_id}/question/add', 'CrudQuestionsController@addShowForm')->name('admin.showAddQuestionsForm');
Route::post('/tests/{test_id}/question/add', 'CrudQuestionsController@addPost');
Route::get('/tests/question/toggle/{question_id}', 'CrudQuestionsController@toggle')->name('admin.toggleQuestion');