<?php

use SimpleCms\Blog\Models\Post;

class PostsTableSeeder extends Seeder {

  public function __construct()
  {
    $this->faker = Faker\Factory::create();
  }

  public function run()
  {
    // Switch of Eloquent Guarding
    Eloquent::unguard();

    // An empty variable to hold our Posts
    $posts = [];

    // Generate the Posts
    for ($i = 0; $i < 20; $i++)
    {
      // Since I can't find a way to use Faker to generate long paragraphs I've had to hack this in
      // I REALLY should put into a custom Provider
      $postContent = [];

      // Here we create some dummy paragraphs
      for ($p = 0; $p < 8; $p++)
      {
        $postContent[] = $this->faker->paragraph($this->faker->numberBetween(1, 30));
      }

      // Generate a fake Post
      $posts[] = [
        'author_id' => 1,
        'category_id' => 1,
        'status' => (bool) rand(0, 1),
        'slug' => $this->faker->slug(),
        'meta_title' => $this->faker->sentence(5),
        'meta_description' => $this->faker->sentence(5),
        'title' => implode(' ', $this->faker->words(5)),
        'excerpt' => implode(' ', $this->faker->sentences(25)),
        // Here we dump those dummy paragraphs into <p> tags
        'content' => '<p>' . implode("</p>\n\n<p>", $postContent) . '</p>',
        'created_at' => $this->faker->dateTime(),
        'updated_at' => $this->faker->dateTime(),
      ];
    }

    // Finally insert the Posts
    DB::table('posts')->insert($posts);
  }

}
