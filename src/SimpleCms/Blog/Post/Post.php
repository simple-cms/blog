<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Core\Models\BaseModel;

class Post extends BaseModel {

  protected static $rules = [
    'id' => 'numeric',
    'author_id' => 'numeric|required',
    'category_id' => 'numeric|required',
    'status' => 'numeric|required',
    'slug' => 'alpha_dash|max:80',
    'meta_title' => 'max:70',
    'meta_description' => 'max:155',
    'title' => 'max:100|required',
    'excerpt' => '',
    'content' => 'required'
  ];

  protected $fillable = [
    'category_id',
    'status',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

}