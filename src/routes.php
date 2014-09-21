<?php

Route::resource('post', 'SimpleCms\Blog\Post\PublicController', ['only' => ['index','show']]);
Route::resource('category', 'SimpleCms\Blog\Category\PublicController', ['only' => ['index','show']]);

Route::group(['prefix' => 'control'], function()
{
  Route::resource('post', 'SimpleCms\Blog\Post\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
  Route::resource('category', 'SimpleCms\Blog\Category\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
});