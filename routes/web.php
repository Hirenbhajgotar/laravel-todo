<?php

use Illuminate\Support\Facades\Route;


Route::resource('/todo', 'TodoController');
// Route::get('/todos', 'TodoController@index');
// Route::get('/todos/create', 'TodoController@create');
// Route::post('/todos/create', 'TodoController@store');
// Route::get('/todos/{id}/edit', 'TodoController@edit');
// Route::patch('/todos/{todo}/update', 'TodoController@update')->name('todos.update');
// Route::delete('/todos/{todo}/delete', 'TodoController@delete')->name('todo.delete');
Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
Route::put('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
