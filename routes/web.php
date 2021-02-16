<?php

use Illuminate\Support\Facades\Route;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', 'nightly');
}

if (! defined('LATEST_VERSION')) {
    define('LATEST_VERSION', 'v0.11.0');
}

Route::pattern('slug', '[a-z0-9-]+');

Route::get('/x/{project}', 'VanityController')->name('vanity')->where('project', '(.*)');

Route::get('/blog.json', 'BlogFeedController');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{year}/{month}/{slug}', 'BlogController@show')->name('blog.show');

Route::get('/docs', 'DocsController@index');
Route::get('/docs/{version}/{page?}', 'DocsController@show')->name('docs.version');

Route::get('/', function () {
    return view('welcome');
});
