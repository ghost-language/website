<?php

use Illuminate\Support\Facades\Route;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', 'nightly');
}

Route::pattern('slug', '[a-z0-9-]+');

Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{year}/{month}/{slug}', 'BlogController@show')->name('blog.show');

Route::get('/docs', 'DocsController@index');
Route::get('/docs/{version}/{page?}', 'DocsController@show')->name('docs.version');

Route::get('/', function () {
    return view('welcome');
});
