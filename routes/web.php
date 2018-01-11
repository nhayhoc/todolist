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
    return redirect()->route('todo.index');
});
Route::group(['prefix' => 'todo'], function() {
    Route::get('/index', ['uses'=>'TodoController@index','as'=>'todo.index']);
    Route::post('/store', ['uses'=>'TodoController@store','as'=>'todo.store']);
    Route::get('/destroy/{id}', ['uses'=>'TodoController@destroy','as'=>'todo.destroy']);
    Route::post('/update', ['uses'=>'TodoController@update','as'=>'todo.update']);
});