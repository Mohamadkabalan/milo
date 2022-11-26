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

Route::get('/', 'App\Http\Controllers\UserController@login')->defaults('_config',['view' => 'login']);

Route::group(['middleware'=> ['UserVerification']], function () {
  Route::prefix('users')->group(function(){
    Route::get('logout','App\Http\Controllers\UserController@logout')->defaults('_config', ['redirect' => 'login'])->name('logout');

    Route::get('/login', 'App\Http\Controllers\UserController@login')->defaults('_config',['view' => 'login'])->name('login');
    Route::post('/login-action','App\Http\Controllers\UserController@loginAction')->name('login-action');

    Route::get('/register', 'App\Http\Controllers\UserController@register')->defaults('_config',['view' => 'register'])->name('register');
    Route::post('/register-action','App\Http\Controllers\UserController@registerAction')->name('register-action');


    Route::get('/home','App\Http\Controllers\UserController@home')->defaults('_config', ['view' => 'home'])->name('home');

    Route::post('/submit-survey','App\Http\Controllers\UserController@submitSurvey')->name('submit-survey');

    Route::get('/statistics','App\Http\Controllers\UserController@statistics')->defaults('_config', ['view' => 'statistics'])->name('statistics');

    Route::get('/pending-users','App\Http\Controllers\UserController@pendingUsers')->defaults('_config', ['view' => 'pending-users'])->name('pending-users');

    Route::get('/statistic/{question_id}','App\Http\Controllers\UserController@statistic')->defaults('_config', ['view' => 'statistic'])->name('statistic');

    Route::get('/questions','App\Http\Controllers\UserController@questions')->defaults('_config', ['view' => 'questions'])->name('fetch-questions');

    Route::get('/question/create','App\Http\Controllers\UserController@createQuestion')->defaults('_config', ['view' => 'create-question'])->name('create-questions');

    Route::post('/question/create','App\Http\Controllers\UserController@storeQuestion')->name('store-questions');


    Route::get('/question/edit/{question_id}','App\Http\Controllers\UserController@editQuestion')->defaults('_config', ['view' => 'edit-question'])->name('edit-questions');

    Route::post('/question/edit/{question_id}','App\Http\Controllers\UserController@updateQuestion')->name('update-questions');

    Route::get('/question/delete/{id}', 'App\Http\Controllers\UserController@destroyQuestion')->defaults('_config', [
      'redirect' => 'fetch-questions'
    ])->name('question.delete');


  });
});

Route::get('/questions','App\Http\Controllers\QuestionController@fetch')->defaults('_config', [])->name('questions');
