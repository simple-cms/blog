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
    return View::make('blog::Admin/Post/Form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $post = $this->post->store(Input::all());

    if ($post->hasErrors())
    {
      return Redirect::route('control.post.create')->withInput()->withErrors($post->getErrors());
    }

    return Redirect::route('control.post.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully created '. $post->title .'!'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit($id)
  {
    return View::make('blog::Admin/Post/Form', [
      'post' => $this->post->getById($id)
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @return Response
   */
  public function update($id)
  {
    $post = $this->post->update($id, Input::all());

    if ($post->hasErrors())
    {
      return Redirect::route('control.post.edit', $post->id)->withInput()->withErrors($post->getErrors());
    }

    return Redirect::route('control.post.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully updated '. $post->title .'!'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return Response
   */
  public function destroy($id)
  {
    dd('Remove the specified resource from storage.');
  }
}