<?php

use Illuminate\Support\Facades\Route;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', 'master');
}

Route::get('/docs', 'DocsController@index');
Route::get('/docs/{version}/{page?}', 'DocsController@show')->name('docs.version');

Route::get('/', function () {
    return view('welcome');
});
