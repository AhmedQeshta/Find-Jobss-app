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

################################### user Page ##########################################

Auth::routes();

#################---------- site page --- --------##########################
    Route::get('/', 'HomeController@HomePage');
    Route::get('/home', 'HomeController@index')->name('home');

#################---------- login with google --- Socialite Route--------##########################
Route::group(['namespace' => 'Users'],function (){
    Route::get('/auth/redirect/{provider}', 'SocialController@redirect')->name('login.with.google');
    Route::get('/callback/{provider}', 'SocialController@callback');
});

Route::group(['namespace' => 'Users','prefix'=>'user'],function (){
    Route::get('profile', 'ProfileController@index')->name('user.profile');
    Route::post('password/update', 'ProfileController@updatePassword')->name('user.password.update');//if have old password
    Route::post('profile/update', 'ProfileController@updateProfile')->name('user.profile.update');//if have not old password

    Route::put('update/Status', 'ProfileController@updateStatusQuestion')->name('user.quiz.update.Status');
    Route::get('show/answers','ProfileController@ShowAnswers')->name('user.quiz.show.answers');

    Route::get('show/cv','ProfileController@ShowCV')->name('user.quiz.show.cv');

    Route::group(['prefix'=>'quiz'],function (){
        Route::get('/', 'ProfileController@indexQuiz')->name('user.quiz');
        Route::post('store', 'ProfileController@AnswerStore')->name('user.quiz.store');
    });
});








#################---------- Admin --- Socialite Route--------##########################
Route::group(['namespace' => 'Admin','prefix'=>'admin'],function (){
    Route::get('home', 'HomeAdminController@index')->name('admin.DashBord');
    Route::get('/', 'LoginAdminController@showLoginForm')->name('Show.Form.login');
    Route::post('/', 'LoginAdminController@login')->name('admin.login');
    Route::get('logout', 'HomeAdminController@logout')->name('admin.logout');

    ##################### profile ###################
    Route::get('profile', 'ProfileAdminController@index')->name('admin.profile');
    Route::put('password/update', 'ProfileAdminController@updatePassword')->name('admin.password.update');//if have old password

    ##################### Add Jop ###################
    Route::group(['prefix'=>'jobs'] ,function(){
        Route::get('/', 'JobController@index')->name('admin.jobs');
        Route::get('create', 'JobController@create')->name('admin.jobs.create');
        Route::post('store', 'JobController@store')->name('admin.jobs.store');
        Route::get('delete/{id}', 'JobController@destroy')->name('admin.jobs.destroy');
        Route::get('edit/{id}/{slug}', 'JobController@edit')->name('admin.jobs.edit');
        Route::post('update/{id}/{slug}', 'JobController@update')->name('admin.jobs.update');
        Route::get('show/{id}/{slug}', 'JobController@show')->name('admin.jobs.show');
    });

    ##################### Add Quiz ###################
    Route::group(['prefix'=>'quiz'] ,function(){
        Route::get('/', 'QuizController@index')->name('admin.quiz');
        Route::get('create', 'QuizController@create')->name('admin.quiz.create');
        Route::post('store', 'QuizController@store')->name('admin.quiz.store');
        Route::get('delete/{id}', 'QuizController@destroy')->name('admin.quiz.destroy');
        Route::get('edit/{id}/{slug}', 'QuizController@edit')->name('admin.quiz.edit');
        Route::post('update/{id}/{slug}', 'QuizController@update')->name('admin.quiz.update');
        Route::get('show/{id}/{slug}', 'QuizController@show')->name('admin.quiz.show');
        ######################
        Route::get('users/answers', 'QuizController@indexAnswerQuiz')->name('admin.quiz.users.answers');
        Route::get('show/user/answer/{id}', 'QuizController@showAnswerUser')->name('admin.quiz.showAnswerUser');
        Route::get('user/updateStatusAnswer/{id}', 'QuizController@updateStatusAnswer')->name('admin.quiz.updateStatusAnswer');
        Route::get('user/updateStatusUser/{id}', 'QuizController@updateStatusUser')->name('admin.quiz.updateStatusUser');
        Route::put('user/updatePercentage/{id}', 'QuizController@updatePercentage')->name('admin.quiz.updatePercentage');
    });

});
