<?php

use Illuminate\Support\Facades\Route;

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

//admin links
Route::middleware('isadmin')->group(function(){
    //create 
    Route::get('books/create','BookController@create');
    Route::post('books/store','BookController@store');
    //update 
    Route::get('books/edit/{id}','BookController@edit');
    Route::post('books/update/{id}','BookController@update');
    //delete 
    Route::get('books/delete/{id}','BookController@delete');

    Route::get('categories','CategoryController@categories');
Route::post('categories/save','CategoryController@save'); 

    });
    
    //user links
    Route::middleware('isloggedin')->group(function(){
    //read 
    Route::get('/books/list','BookController@list');
    
    Route::get('/books/show/{id}','BookController@show');
    
    Route::get('/users/logout','UserController@logout');    

    //notes    
    Route::get('users/notes','NoteController@notes');
    Route::post('users/savenote','NoteController@savenote');  

    });
    
    //guest
    //Users
    //register
    Route::get('users/register','UserController@register');
    Route::post('users/store','UserController@store');
    //login
    Route::get('users/login','UserController@loginform');
    Route::post('users/handleloign','UserController@handleloign');
    //not auth 
    Route::get('/notauth',function(){
        return "you dont have permission to access this link";
    });
    
    
    

