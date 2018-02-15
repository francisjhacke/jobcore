<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned()->index();
          $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
          $table->string('title');
          $table->string('description');
          $table->integer('category_id')->unsigned()->index();
          $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
          $table->date('booked_date');
          $table->time('booked_time');
          $table->decimal('pay',7,2);
          $table->string('address');
          $table->rememberToken();
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
        Schema::drop('jobs');
    }
}
