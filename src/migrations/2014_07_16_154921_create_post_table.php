<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('posts', function($table)
    {
      $table->increments('id');
      $table->integer('author_id')->references('id')->on('users');
      $table->integer('category_id')->references('id')->on('category');
      $table->tinyInteger('hidden')->default(0);
      $table->string('slug', 80)->unique();
      $table->string('meta_title', 70)->unique();
      $table->string('meta_description', 155)->unique();
      $table->string('title', 100);
      $table->text('excerpt');
      $table->text('content');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('posts');
  }

}