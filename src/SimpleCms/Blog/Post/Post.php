<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Core\Models\BaseModel;

class Post extends BaseModel {

  protected $fillable = [
    'category_id',
    'author_id',
    'status',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

}