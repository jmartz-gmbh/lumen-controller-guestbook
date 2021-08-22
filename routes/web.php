<?php

use Illuminate\Support\Facades\Route;

Route::get('/guestbook/id/{id}', [
    'middleware' => [],
    'uses' => 'App\Http\Controllers\GuestbookController@id'
]);

Route::get('/guestbook/latest', [
    'middleware' => [],
    'uses' => 'App\Http\Controllers\GuestbookController@latest'
]);

Route::post('/guestbook/add', [
    'middleware' => [],
    'uses' => 'App\Http\Controllers\GuestbookController@add'
]);
