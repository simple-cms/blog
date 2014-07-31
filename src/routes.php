<?php

Route::resource('post', 'SimpleCms\Blog\Post\PostPublicController');

Route::group(['prefix' => 'control'], function()
{
  Route::resource('post', 'SimpleCms\Blog\Post\PostAdminController');
});