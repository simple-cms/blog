<?php namespace SimpleCms\Blog;

use Illuminate\Support\ServiceProvider;
use SimpleCms\Blog\Post\Post;
use SimpleCms\Blog\Category\Category;
use SimpleCms\Blog\Category\ContentProvider as CategoryContentProvider;

class BlogServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    // Register our package views
    $this->loadViewsFrom(__DIR__.'/../../views', 'blog');

    // Register our package translation files
    $this->loadTranslationsFrom(__DIR__.'/../../lang', 'blog');

    // Register the files our package should publish
    $this->publishes([
      // Publish our views
      __DIR__.'/../../views' => base_path('resources/views/vendor/blog'),
      // Publish our config
      __DIR__.'/../../config/category.php' => config_path('category.php'),
      __DIR__.'/../../config/post.php' => config_path('post.php'),
    ]);

    require_once __DIR__ .'/../../routes.php';
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    // $this->mergeConfigFrom(
    //   'blog', __DIR__.'/../../config/config.php'
    // );

    $this->app->make('ContentProviderService')->registerProvider(new CategoryContentProvider);

    $this->app->bind('\SimpleCms\Blog\Post\RepositoryInterface', function($app)
    {
      return new \SimpleCms\Blog\Post\EloquentRepository(new Post);
    });


    $this->app->bind('\SimpleCms\Blog\Category\RepositoryInterface', function($app)
    {
      return new \SimpleCms\Blog\Category\EloquentRepository(new Category);
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [];
  }

}
