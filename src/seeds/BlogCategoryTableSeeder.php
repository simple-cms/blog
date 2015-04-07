<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryTableSeeder extends Seeder {

  public function __construct()
  {
    $this->faker = Faker\Factory::create();
  }

  public function run()
  {
    // Switch of Eloquent Guarding
    Model::unguard();

    // An empty variable to hold our Categories
    $categories = [];

    // Generate the Categories
    for ($i = 0; $i < 5; $i++)
    {
      // Generate a fake Category
      $categories[] = [
        'slug' => $this->faker->slug(),
        'title' => implode(' ', $this->faker->words(2)),
        'excerpt' => implode(' ', $this->faker->sentences(5)),
        'meta_title' => $this->faker->sentence(5),
        'meta_description' => $this->faker->sentence(5),
        'content' => '<p>' . implode("</p>\n\n<p>", $this->faker->paragraphs(5)) . '</p>',
        'created_at' => $this->faker->dateTime(),
        'updated_at' => $this->faker->dateTime(),
      ];
    }

    // Finally insert the Posts
    DB::table('blog_category')->insert($categories);
  }

}
