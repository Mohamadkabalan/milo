<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_answers', function (Blueprint $table) {
      $table->id();

      $table->bigInteger('question_id')->unsigned();
      $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

      $table->bigInteger('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

      $table->bigInteger('answer_id')->unsigned();
      $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');

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
    Schema::dropIfExists('user_answers');
  }
};
