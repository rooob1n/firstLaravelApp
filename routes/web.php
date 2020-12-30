<?php

// main START
Route::get('/', 'App\Http\Controllers\PostsController@index')->name('home');
// main END

// POST START
Route::get('/Posts/create', 'App\Http\Controllers\PostsController@create');

Route::get('/Posts/{post}', 'App\Http\Controllers\PostsController@show')->name('viewPost');

Route::get('/Posts/{id}/Delete', 'App\Http\Controllers\PostsController@destroy');

Route::get('/Posts/{post}/Update', 'App\Http\Controllers\PostsController@show')->name('updatePost');

Route::post('/Posts', 'App\Http\Controllers\PostsController@store');

Route::post('/Posts/{post}/Update', 'App\Http\Controllers\PostsController@update');

Route::post('/Posts/{post}/comments', 'App\Http\Controllers\CommentsController@store');

// POST ENDS

Route::get('/Posts/Tags/{tag}', 'App\Http\Controllers\TagsController@index');

Route::get('/Register', 'App\Http\Controllers\RegistrationsController@create')->name('login');

Route::post('/Register', 'App\Http\Controllers\RegistrationsController@store');

Route::get('/Login', 'App\Http\Controllers\SessionsController@create');

Route::post('/Login', 'App\Http\Controllers\SessionsController@store');

Route::get('/Logout', 'App\Http\Controllers\SessionsController@destroy');

