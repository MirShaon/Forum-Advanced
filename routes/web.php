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

Route::get('/discuss', function () {
    return view('discuss');
});

Auth::routes();


Route::get('/forum',[

       'uses' => 'ForumController@index',
       'as'   => 'forum'

]);

Route::get('channel/{slug}',[

     'uses' => 'ForumController@channel',
     'as'   => 'channel'
]);

Route::get('/forum', 'HomeController@index')->name('forum');

Route::get('{provider}/auth', [
    'uses' => 'SocialController@auth',
    'as' => 'social.auth'
]);

Route::get('/{provider}/redirect', [
    'uses' => 'SocialController@auth_callback',
    'as' => 'social.callback'
]);




Route::group(['middleware' => 'auth'], function() {

    Route::resource('channels', 'ChannelController');

    Route::get('discussion/create/new', [
        
        'uses' => 'DiscussionsController@create',
        'as'   => 'discussions.create'


    ]); 
    
    Route::post('discussion/store', [
        
        'uses' => 'DiscussionsController@store',
        'as'   => 'discussions.store'


    ]);

    Route::get('discussion/{slug}', [
        
        'uses' => 'DiscussionsController@show',
        'as'   => 'discussion'


    ]);
    Route::post('discussion/reply/{id}', [
        
        'uses' => 'DiscussionsController@reply',
        'as'   => 'discussion.reply'


    ]);
    Route::get('reply/like/{id}', [
        
        'uses' => 'RepliesController@like',
        'as'   => 'reply.like'


    ]);
    Route::get('reply/unlike/{id}', [
        
        'uses' => 'RepliesController@unlike',
        'as'   => 'reply.unlike'


    ]); 
    Route::get('discussion/watch/{id}', [
        
        'uses' => 'WatchersController@watch',
        'as'   => 'discussion.watch'


    ]);
    Route::get('discussion/unwatch/{id}', [
        
        'uses' => 'WatchersController@unwatch',
        'as'   => 'discussion.unwatch'


    ]);

    Route::get('/discussion/best/reply/{id}',[

        
       'uses' => 'RepliesController@best_answer',
       'as'   => 'discussion.best.answer'

    ]);
    Route::get('/discussions/edit/{slug}',[

        
       'uses' => 'DiscussionsController@edit',
       'as'   => 'discussion.edit'

    ]);
    Route::post('/discussions/update/{id}',[

        
       'uses' => 'DiscussionsController@update',
       'as'   => 'discussions.update'

    ]);
    Route::get('reply/edit/{id}',[

        
       'uses' => 'RepliesController@edit',
       'as'   => 'reply.edit'

    ]); 
    Route::post('reply/update/{id}',[

        
       'uses' => 'RepliesController@update',
       'as'   => 'reply.update'

    ]);
    
});

