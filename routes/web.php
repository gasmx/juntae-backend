<?php

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('/user', 'UserController')->middleware('auth:api');
Route::apiResource('/activity', 'ActivityController')->middleware('auth:api');
Route::apiResource('/activity-file', 'ActivityFileController')->middleware('auth:api');
Route::apiResource('/activity-user', 'ActivityUserController')->middleware('auth:api');
Route::apiResource('/activity-card', 'ActivityCardController')->middleware('auth:api');
Route::apiResource('/activity-comment', 'ActivityCommentController')->middleware('auth:api');
Route::apiResource('/activity-card-status', 'ActivityCardStatusController')->middleware('auth:api');

Route::post('/user', 'UserController@store');