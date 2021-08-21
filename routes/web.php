<?php

use Illuminate\Support\Facades\Route;

Route::get('/guestbook/id/{id}', [
    'middleware' => [],
    'uses' => 'App\Http\Controllers\GuestBookController@id'
]);

Route::get('/guestbook/latest', [
    'middleware' => [],
    'uses' => 'App\Http\Controllers\GuestBookController@latest'
]);
