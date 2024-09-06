<?php

use Illuminate\Support\Facades\Route;


Route::get('/default', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('browser');
});

Route::post('/searchContent', [SearchEngine::class, 'searchBrowser']);