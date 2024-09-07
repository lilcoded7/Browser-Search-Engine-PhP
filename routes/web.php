<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchEngine;


Route::get('/default', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('browser');
});

Route::post('/searchContent', [SearchEngine::class, 'searchBrowser']);
Route::get('testing/', [SearchEngine::class, 'getsearchData']);