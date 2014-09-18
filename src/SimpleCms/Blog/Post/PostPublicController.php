<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Blog\Post\PostRepositoryInterface;
use SimpleCms\Core\Controllers\BaseController;
use View;

class PostPublicController extends BaseController {

  /**
   * Store our PostRepositoryInterface implementation.
   *
   * @var Simple\Blog\Post\PostRepositoryInterface
   */
  protected $post;

  /**
   * Set up the class
   *
   * @param Simple\Blog\Post\PostRepositoryInterface $posts
   *
   * @return void
   */
  public function __construct(PostRepositoryInterface $post)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->post = $post;
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return View::make('blog::Public/PostList', [
      'metaTitle' => 'Home page title',
      'metaDesciption' => 'Home page description',
      'posts' => $this->post->all()
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function show($slug)
  {
    return View::make('blog::Public/PostShow', [
      'metaTitle' => 'slug page title',
      'metaDesciption' => 'slug page description',
      'post' => $this->post->getFirstBy('slug', $slug)
    ]);
  }

}