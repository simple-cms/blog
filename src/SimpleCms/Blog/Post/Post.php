<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Core\BaseModel;

class Post extends BaseModel
{
  protected $table = 'blog_post';

  protected $fillable = [
    'category_id',
    'author_id',
    'hidden',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

  public function category()
  {
    return $this->belongsTo('SimpleCms\Blog\Category\Category');
  }

}