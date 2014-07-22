<?php

use SimpleCms\Blog\Models\Post;

class CategoriesTableSeeder extends Seeder {

  public function __construct()
  {
    $this->faker = Faker\Factory::create();
  }

  public function run()
  {
    // Switch of Eloquent Guarding
    Eloquent::unguard();

    // An empty variable to hold our Categories
    $categories = [];

    // Generate the Categories
    for ($i = 0; $i < 2; $i++)
    {
      // Generate a fake Category
      $categories = [
        'slug' => $this->faker->slug(),
        'title' => implode(' ', $this->faker->words(5)),
        'excerpt' => implode(' ', $this->faker->sentences(25)),
        'meta_title' => $this->faker->sentence(5),
        'meta_description' => $this->faker->sentence(5),
        'content' => '<p>' . implode("</p>\n\n<p>", $this->faker->paragraphs(5)) . '</p>',
        'created_at' => $this->faker->dateTime(),
        'updated_at' => $this->faker->dateTime(),
      ];

      // Finally insert the Posts
      DB::table('categories')->insert($categories);
    }
  }

}
