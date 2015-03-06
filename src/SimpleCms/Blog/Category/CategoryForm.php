<?php namespace SimpleCms\Blog\Category;

use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{

    public function buildForm()
    {
        $config = config('category.formFields');
        foreach($config as $field => $attributes)
        {
          $this->add($field, $attributes['type'], (isset($attributes['additional'])) ? $attributes['additional'] : []);
        }
    }

}