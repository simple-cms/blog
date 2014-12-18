<?php

Route::resource(Config::get('blog::postURL'), 'SimpleCms\Blog\Post\PublicController', ['only' => ['index','show']]);
Route::resource(Config::get('blog::categoryURL'), 'SimpleCms\Blog\Category\PublicController', ['only' => ['index','show']]);

Route::group(['prefix' => Config::get('core::adminURL')], function()
{
  Route::resource(Config::get('blog::postURL'), 'SimpleCms\Blog\Post\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
  Route::resource(Config::get('blog::categoryURL'), 'SimpleCms\Blog\Category\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
});