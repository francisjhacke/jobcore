<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobconnectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_connections', function (Blueprint $table) {
          $table->integer('user_id')->unsigned()->index();
          $table->integer('job_id')->unsigned()->index();
          $table->primary(array('user_id', 'job_id'));
          $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
          $table->foreign('job_id')->references('id')->on('jobs')
                ->onDelete('cascade');
          $table->boolean('confirmed')->default(0);
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
        Schema::drop('job_connections');
    }
}
