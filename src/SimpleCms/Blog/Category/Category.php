<?php namespace SimpleCms\Blog\Category;

use SimpleCms\Core\BaseModel;

class Category extends BaseModel {

  protected $fillable = [
    'status',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

}