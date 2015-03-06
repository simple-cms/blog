<?php namespace SimpleCms\Blog\Category;

use SimpleCms\Blog\Category\RepositoryInterface;
use SimpleCms\Core\BaseController;
use View;

class PublicController extends BaseController {

  /**
   * Store our RepositoryInterface implementation.
   *
   * @var Simple\Blog\Category\RepositoryInterface
   */
  protected $category;

  /**
   * Set up the class
   *
   * @param Simple\Blog\Category\RepositoryInterface $category
   *
   * @return void
   */
  public function __construct(RepositoryInterface $category)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->category = $category;
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('blog::Public/Category/Index', [
      'metaTitle' => 'Home page title',
      'metaDesciption' => 'Home page description',
      'categorys' => $this->category->paginate()
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function show($slug)
  {
    return view('blog::Public/Category/Show', [
      'metaTitle' => 'slug page title',
      'metaDesciption' => 'slug page description',
      'category' => $this->category->getFirstBy('slug', $slug)
    ]);
  }

}