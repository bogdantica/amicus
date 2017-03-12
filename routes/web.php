<?php

Auth::routes();

Route::get('/test',function (){


});

Route::group([
    'middleware' => [
        'auth',
        'role:admin'
    ],
    'namespace' => 'Web'
],function (){

    //users routes

    Route::get('/profile',[
        'as' => 'users.my-profile',
        'uses' => 'UsersController@profile',
        'middleware' => [
            'permission:view-profile'
        ]
    ]);

    Route::get('/profile/{user}',[
        'as' => 'users.profile',
        'uses' => 'UsersController@profile',
        'middleware' => [
            'permission:view-profile'
        ]
    ]);

    Route::put('/profile/update/{user}',[
        'as' => 'users.profile.update',
        'uses' => 'UsersController@update',
        'middleware' => [
            'permission:edit-profiles'
        ]
    ]);


    //event
    Route::get('/events/{event}',[
       'as' => 'event.show',
        'uses' => 'EventsController@show',
        'middleware' => [
            'permission:view-event'
        ]
    ]);

    Route::post('/events/create',[
       'as' => 'event.create',
//        'uses' => 'EventsController@show',
        'middleware' => [
            'permission:edit-events'
        ]
    ]);



    Route::get('/',[
        'as' => 'home',
        'uses' => 'HomeController@home',
        'permission' => [
            'permission:view-home'
        ]
    ]);


    //todo controlelr
    Route::get('/subsidiaries/{subsidiary}',[
        'as' => 'subsidiary.show',
//        'uses' => 'SubsidiariesController@show',
        'middleware' => [
            'permission:view-subsidiary'
        ]
    ]);    //todo controlelr
    Route::post('/subsidiaries/create',[
        'as' => 'subsidiary.create',
//        'uses' => 'SubsidiariesController@show',
        'middleware' => [
            'permission:edit-subsidiaries'
        ]
    ]);

    //todo controlelr
    Route::get('/posts/{post}',[
        'as' => 'posts.show',
//        'uses' => 'SubsidiariesController@show',
        'middleware' => [
            'permission:view-posts'
        ]
    ]);    //todo controlelr
    Route::post('/posts/create',[
        'as' => 'posts.create',
//        'uses' => 'SubsidiariesController@show',
        'middleware' => [
            'permission:edit-posts'
        ]
    ]);

    //todo controlelr
    Route::get('/resources/{resource}',[
        'as' => 'resources.show',
//        'uses' => 'SubsidiariesController@show',
        'middleware' => [
            'permission:view-resource'
        ]
    ]);    //todo controlelr
    Route::post('/resources/create',[
        'as' => 'resources.create',
//        'uses' => 'SubsidiariesController@show',
        'middleware' => [
            'permission:edit-resources'
        ]
    ]);

});

