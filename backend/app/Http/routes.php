<?php

Route::post('/authentication','Auth\AuthController@authenticate');


Route::group(['middleware' => ['jwt.auth'] ] , function(){

    Route::resource('client', 'ClientController', ['except' => ['create','edit']]);
    Route::resource('project', 'ProjectController', ['except' => ['create','edit']]);
   
    Route::group(['prefix' => 'project'],function(){

        Route::get('{id}/notes', 'ProjectNoteController@index');
        Route::get('{id}/notes/{noteId}','ProjectNoteController@show');
        Route::post('{id}/notes/','ProjectNoteController@store');
        Route::put('{id}/notes/{noteId}','ProjectNoteController@update');
        Route::delete('{id}/notes/{noteId}','ProjectNoteController@destroy');

        Route::post('{id}/file','ProjectFileController@store');
        Route::delete('{project_id}/file/{id}','ProjectFileController@destroy');

    });
});
