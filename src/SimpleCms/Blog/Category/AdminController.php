<?php namespace SimpleCms\Blog\Category;

use Kris\LaravelFormBuilder\FormBuilder;
use View;
use Config;
use Redirect;
use SimpleCms\Core\BaseController;

class AdminController extends BaseController {

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
    return view('blog::Admin/Category/Index', [
      'categories' => $this->category->all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @param FormBuilder $formBuilder
   *
   * @return Response
   */
  public function create(FormBuilder $formBuilder)
  {
    $form = $formBuilder->create('SimpleCms\Blog\Category\CategoryForm', [
      'method' => 'POST',
      'url' => route(config('core.adminURL') .'.'. config('category.categoryURL') .'.store')
    ]);

    return view('blog::Admin/Category/Form', compact('form'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CreateRequest $request)
  {
    $category = $this->category->store($request->all());

    return Redirect::route(config('core.adminURL') .'.'. config('category.categoryURL') .'.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully created '. $category->title .'!'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit($id)
  {
    return view('blog::Admin/Category/Form', [
      'category' => $this->category->getById($id),
      'categories' => $this->category->getSelectArray()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @return Response
   */
  public function update(UpdateRequest $request)
  {
    $category = $this->category->update($request->{config('category.categoryURL')}, $request->all());

    return Redirect::route(config('core.adminURL') .'.'. config('category.categoryURL') .'.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully updated '. $request->title .'!'
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