<?php

use Illuminate\Support\Facades\Route;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', 'nightly');
}

if (! defined('LATEST_VERSION')) {
    define('LATEST_VERSION', 'v1.0-beta.1');
}

Route::pattern('slug', '[a-z0-9-]+');

Route::domain('play.'.env('APP_BASE_DOMAIN'))->group(function() {
    Route::get('/', 'PlayController@index')->name('play');
});

Route::get('/x/{project}', 'VanityController')->name('vanity')->where('project', '(.*)');

Route::get('/blog.json', 'BlogFeedController');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{year}/{month}/{slug}', 'BlogController@show')->name('blog.show');

Route::get('/docs', 'DocsController@index');
Route::get('/docs/{version}/{page?}', 'DocsController@show')->name('docs.version');

Route::get('/discord', function() {
    return redirect(env('DISCORD_INVITE_URL', '/'));
});

Route::get('/roadmap', function() {
    return view('roadmap');
});

Route::get('/play', function() {
    return Redirect::route('play');
});

Route::get('/', function () {
    return view('welcome');
});