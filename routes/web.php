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

Route::get('/', 'UserController@index');
Route::post('/userlogin', 'UserController@login')->name('userlogin');
Route::post('/ajaxlogin', 'UserController@ajaxlogin')->name('ajaxlogin');
Route::get('/api/register', 'UserController@register')->name('api/register');

Route::get('/logout', 'UserController@logout')->name('logout');
Auth::routes();

Route::group(['middleware' => ['usersession']], function () {
    Route::get('/conference', 'SessionsController@index')->name('conference');
    Route::get('/lobby', 'SessionsController@lobby')->name('lobby');
    Route::get('/countdown', 'UserController@countdown')->name('countdown');
    Route::get('/awards', 'SessionsController@awards')->name('awards');
    Route::get('/survey', 'SessionsController@survey')->name('survey');
    Route::post('/survey_response', 'SessionsController@save_response')->name('survey_response');

    Route::get('/networking', 'ChatController@index')->name('networking');
    Route::get('/networking/{id}', 'videoMeetController@meeting')->name('meeting');
    Route::get('/helpdesk', 'ChatController@helpdesk')->name('helpdesk');
    Route::post('/emailconnect', 'ChatController@emailConnect')->name('emailconnect');
    Route::get('/requestmeeting', 'ChatController@requestmeeting')->name('requestmeeting');

    Route::get('/exhibition', 'SponsorsController@index')->name('exhibition');
    Route::get('/resources/{id}', 'SponsorsController@assets')->name('resources');
    Route::get('/resource', 'SponsorsController@resources')->name('resource');

    Route::post('/track-event', 'SessionTrackingController@track_session')->name('track-event');
    Route::post('/track-close-event', 'SessionTrackingController@track_close_session')->name('track-close-event');
    Route::get('/track-live-session', 'SessionTrackingController@track_live_session')->name('track-live-session');
    Route::get('/profile', 'UserController@view_profile')->name('profile');
    Route::get('/edit-profile', 'UserController@edit_profile')->name('edit-profile');
    Route::post('/edit-profile', 'UserController@edit_profile')->name('edit-profile');

    Route::post('/token', 'TokenController@generate')->name('token-generate');
    Route::get('/token', 'TokenController@generate')->name('token-generate');
    Route::get('/chat', 'TokenController@index')->name('chat-index');

    Route::post('/createmeet', 'videoMeetController@createmeet')->name('createmeet');
    
    Route::post('/request-meeting', 'RequestMeetingController@store')->name('request-meeting');
    Route::post('/ask-question', 'QuestionController@store')->name('ask-question');
});
