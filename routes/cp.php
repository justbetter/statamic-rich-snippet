<?php
/*
 * *
 *  *  * Copyright (C) OptimoApps - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <info@optimoapps.com>
 *  *
 *
 */

Route::group(['middleware' => ['statamic.cp.authenticated'], 'namespace' => 'OptimoApps\RichSnippet\Http\Controllers'], function () {
    Route::get('/optimoapps/richsnippet/', 'RichSnippetController@index')->name('optimoapps.rich-snippet.index');
    Route::post('/optimoapps/richsnippet/', 'RichSnippetController@update')->name('optimoapps.rich-snippet.update');
});
