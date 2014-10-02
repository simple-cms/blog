<?php namespace SimpleCms\Blog\Category;

use SimpleCms\Core\BaseModel;
use SimpleCms\Asset\ModelTrait;

class Category extends BaseModel {

  // Include our Asset Trait
  use ModelTrait;

  protected $fillable = [
    'status',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

  public function categories()
  {
    return $this->hasMany('SimpleCms\Blog\Post\Post');
  }

}