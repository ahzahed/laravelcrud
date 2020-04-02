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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');

   /* DB Query CRUD Start From Here */
//Category CRUD
Route::get('/addCategory', 'HomeController@addCategory')->name('addCategory');
Route::post('/storeAddCategory', 'HomeController@storeAddCategory')->name('storeAddCategory');
Route::get('/viewCategory', 'HomeController@viewCategory')->name('viewCategory');
Route::get('/singleView/{id}', 'HomeController@singleView');
Route::get('/singleDelete/{id}', 'HomeController@singleDelete');
Route::get('/singleUpdate/{id}', 'HomeController@singleUpdate');
Route::post('/storeUpdateCategory/{id}', 'HomeController@storeUpdateCategory');

//Post CRUD
Route::get('/post', 'PostController@post')->name('post');
Route::post('/storePost', 'PostController@storePost')->name('storePost');
Route::get('/viewPost', 'PostController@viewPost')->name('viewPost');
Route::get('/singlePostView/{id}', 'PostController@singlePostView')->name('singlePostView');
Route::get('/singlePostUpdate/{id}', 'PostController@singlePostUpdate')->name('singlePostUpdate');
Route::post('/singlePostStore/{id}', 'PostController@singlePostStore');
Route::get('/singlePostDelete/{id}', 'PostController@singlePostDelete');


   /* Elequent ORM CRUD Start From Here */
Route::get('/student', 'StudentController@student')->name('student');
Route::post('/storeStudent', 'StudentController@storeStudent')->name('storeStudent');
Route::get('/allStudent', 'StudentController@allStudent')->name('allStudent');
Route::get('/singleStudentView/{id}', 'StudentController@singleStudentView')->name('singleStudentView');
Route::get('/singleStudentDelete/{id}', 'StudentController@singleStudentDelete')->name('singleStudentDelete');
Route::get('/singleStudentEdit/{id}', 'StudentController@singleStudentEdit')->name('singleStudentEdit');
Route::post('/singleStudentUpdate/{id}', 'StudentController@singleStudentUpdate')->name('singleStudentUpdate');


   /*  Resource Route */
Route::resource('teacher', 'TeacherController');


   /* Relation */
Route::get('/eormrelation', 'HomeController@about')->name('relation');
Route::get('/users', 'EORMuserController@users')->name('users');
Route::get('/beusers', 'EORMphoneController@beusers')->name('beusers');
Route::get('/beposts', 'EORMpostController@beposts')->name('beposts');
Route::get('/hasposts', 'EORMpostController@hasposts')->name('hasposts');