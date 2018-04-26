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

Route::get('/', function () {  //call view
    return view('welcome');
});

Route::get('/new',[   //call controller
  'uses' => 'PagesController@new'
]);

//select 
Route::get('/todos',[
  'uses' => 'TodosController@index' ,
  'as'   => 'todos'  //name of route
]);

//insert
Route::post('/create/todo',[
   'uses' => 'TodosController@store'
]);

//delete
Route::get('/todo/delete/{id}',[
  'uses' => 'TodosController@delete' ,
   'as'  => 'todo.delete'
]);

//update
Route::get('todo/update/{id}',[
  'uses' => 'TodosController@update' ,
  'as'   => 'todo.update'
]);
//continue to update
Route::post('/todo/save/{id}',[
  'uses' => 'TodosController@save' ,
  'as'   => 'todo.save' 
]);

//mark completed
Route::get('/todo/completed/{id}',[
 'uses' => 'TodosController@completed' ,
 'as'   => 'todo.completed'
]);
