<?php namespace SimpleCms\Blog\Post;

use Illuminate\Database\Eloquent\Model;
use SimpleCms\Blog\Post\RepositoryInterface;
use SimpleCms\Core\Repositories\AbstractEloquentRepository;

class EloquentPostRepository extends AbstractEloquentRepository implements PostRepositoryInterface {

  /**
   * @var Model
   */
  protected $model;

  /**
   * Construct
   *
   * @param Illuminate\Database\Eloquent\Model $model
   */
  public function __construct(Model $model)
  {
    $this->model = $model;
  }

}