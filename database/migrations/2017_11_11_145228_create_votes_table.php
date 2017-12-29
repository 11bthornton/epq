<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionid');
            $table->integer('userid');
            $table->integer('optionid');
            //FOREIGN KEY CONSTRAINTS
            $table->foreign('questionid')->references('id')->on('questions');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('optionid')->references('id')->on('options');
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
        Schema::dropIfExists('votes');
    }
}
