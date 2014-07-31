<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Blog\Post\PostRepositoryInterface;
use SimpleCms\Core\Controllers\BaseController;
use View;
use Input;
use Redirect;

class PostAdminController extends BaseController {

  /**
   * Store our PostRepositoryInterface implementation.
   *
   * @var Simple\Blog\Post\PostRepositoryInterface
   */
  protected $postInterface;

  /**
   * Set up the class
   *
   * @param Simple\Blog\Post\PostRepositoryInterface $post
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
    return View::make('blog::Admin/Post/List', [
      'metaTitle' => 'Home page title',
      'metaDesciption' => 'Home page description',
      'posts' => $this->post->all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    dd('Show the form for creating a new resource.');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    dd('Store a newly created resource in storage.');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit($slug)
  {
    return View::make('blog::Admin/Post/Form', [
      'metaTitle' => 'slug page title',
      'metaDesciption' => 'slug page description',
      'post' => $this->post->getFirstBy('slug', $slug)
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @return Response
   */
  public function update($slug)
  {
    $post = $this->post->update($slug, Input::all());

    if ($post->hasErrors())
    {
      return Redirect::route('control.post.edit', $post->slug)->withInput()->withErrors($post->getErrors());
    }

    return Redirect::route('control.post.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return Response
   */
  public function destroy($slug)
  {
    dd('Remove the specified resource from storage.');
  }
}