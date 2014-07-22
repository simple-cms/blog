<?php namespace SimpleCms\Blog;

use Illuminate\Support\ServiceProvider;
use SimpleCms\Blog\Post\Post;
use SimpleCms\Blog\Post\EloquentPostRepository;

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
    $this->package('simple-cms/blog');

    require __DIR__.'/../../routes.php';
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('SimpleCms\Blog\Post\PostRepositoryInterface', function($app)
    {
      return new EloquentPostRepository(new Post);
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return array();
  }

}
