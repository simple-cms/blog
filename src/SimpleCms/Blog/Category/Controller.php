<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Blog\Category\RepositoryInterface;
use SimpleCms\Core\Controllers\BaseController;

class Controller extends BaseController {

  /**
   * Store our PostRepositoryInterface implementation.
   *
   * @var Simple\Blog\Interfaces\PostRepositoryInterface
   */
  protected $postInterface;

  /**
   * Set up the class
   *
   * @param Simple\Blog\Interfaces\PostRepositoryInterface $posts
   *
   * @return void
   */
  public function __construct(PostRepositoryInterface $posts)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->posts = $posts;
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return \View::make('blog::Public/PostList', [
      'metaTitle' => 'Home page title',
      'metaDesciption' => 'Home page description',
      'posts' => $this->posts->all()
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function show($slug)
  {
    return \View::make('blog::Public/PostShow', [
      'metaTitle' => 'slug page title',
      'metaDesciption' => 'slug page description',
      'post' => $this->posts->getFirstBy('slug', $slug)
    ]);
  }
}