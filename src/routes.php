<?php

Route::resource(config('post.postURL'), 'SimpleCms\Blog\Post\PublicController', ['only' => ['index','show']]);
Route::resource(config('category.categoryURL'), 'SimpleCms\Blog\Category\PublicController', ['only' => ['index','show']]);

Route::group(['prefix' => config('core.adminURL')], function()
{
  Route::resource('post', 'SimpleCms\Blog\Post\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
  Route::resource('category', 'SimpleCms\Blog\Category\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
});